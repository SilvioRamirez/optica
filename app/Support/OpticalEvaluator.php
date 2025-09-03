<?php

namespace App\Support;

final class OpticalEvaluator
{
    /** Convierte "1,25" -> 1.25; ""/null -> null */
    private static function toFloatOrNull(mixed $v): ?float
    {
        if ($v === null) return null;
        if (is_string($v)) {
            $s = trim($v);
            if ($s === '') return null;
            // Acepta "PL" (plano)
            if (strcasecmp($s, 'PL') === 0 || strcasecmp($s, 'PLANO') === 0) return 0.0;
            // Soporta coma decimal
            $s = str_replace(',', '.', $s);
            if (!is_numeric($s)) return null;
            return (float)$s;
        }
        if (is_numeric($v)) return (float)$v;
        return null;
    }

    /** ESF: MIOPÍA / HIPERMETROPÍA / EMÉTROPE (según AQ/AR de tu Excel) */
    public static function evalEsfera(mixed $esf): string
    {
        // En Excel: IFS(Esf="PL","EMÉTROPE", Esf<0,"MIOPÍA", Esf>0,"HIPERMETROPÍA", Esf=0,"EMÉTROPE")
        // Tratamos "PL"/0 como 0.0
        $v = self::toFloatOrNull($esf);
        if ($v === null) {
            // Si está vacío, lo tratamos como 0 para mantener la lógica de "PL"/0 => EMÉTROPE.
            return 'EMÉTROPE';
        }
        if ($v < 0) return 'MIOPÍA';
        if ($v > 0) return 'HIPERMETROPÍA';
        return 'EMÉTROPE';
    }

    /** CIL: ASTIGMATISMO / "" (según AT/AU: cualquier valor no vacío = ASTIGMATISMO) */
    public static function evalCil(mixed $cil): string
    {
        // Tu Excel marca ASTIGMATISMO si la celda NO está vacía, sin mirar si es 0.
        // Replicamos tal cual:
        if (is_string($cil)) return trim($cil) !== '' ? 'ASTIGMATISMO' : '';
        return $cil !== null ? 'ASTIGMATISMO' : '';
    }

    /** Condición por ojo (AW/AX) combinando esfera + si hay astigmatismo */
    public static function condicionOjo(mixed $esf, mixed $cil): string
    {
        $evalEsf = self::evalEsfera($esf);   // MIOPÍA / HIPERMETROPÍA / EMÉTROPE
        $evalCil = self::evalCil($cil);      // ASTIGMATISMO / ""

        if ($evalCil === 'ASTIGMATISMO') {
            return match ($evalEsf) {
                'MIOPÍA' => 'ASTIGMATISMO MIÓPICO',
                'HIPERMETROPÍA' => 'ASTIGMATISMO HIPERMETRÓPICO',
                default => 'ASTIGMATISMO', // emétrope + astigmatismo
            };
        }

        // Sin astigmatismo: se queda con la esfera
        return $evalEsf; // MIOPÍA / HIPERMETROPÍA / EMÉTROPE
    }

    /** IGUAL/DIFERENTE para ESF (AS) */
    public static function evalEsfComparacion(mixed $odEsf, mixed $oiEsf): string
    {
        $a = self::evalEsfera($odEsf);
        $b = self::evalEsfera($oiEsf);
        return $a === $b ? 'IGUAL' : 'DIFERENTE';
    }

    /** IGUAL/DIFERENTE para CIL (AV) */
    public static function evalCilComparacion(mixed $odCil, mixed $oiCil): string
    {
        $a = self::evalCil($odCil); // ASTIGMATISMO/""
        $b = self::evalCil($oiCil);
        return $a === $b ? 'IGUAL' : 'DIFERENTE';
    }

    /**
     * EVAL OJ (AY):
     * - Si condiciones por ojo son iguales ⇒ "IGUAL"
     * - Si uno ESF es MIOPÍA y el otro HIPERMETROPÍA ⇒ "ANTIMETROPÍA"
     * - Si exactamente uno de los dos ESF es EMÉTROPE ⇒ "ANISOMETRÍA SIMPLE"
     * - Si no aplica ⇒ null (Excel devolvería #N/A)
     */
    public static function evalGeneralOJ(
        mixed $odEsf, mixed $odCil,
        mixed $oiEsf, mixed $oiCil
    ): ?string {
        $condOD = self::condicionOjo($odEsf, $odCil);
        $condOI = self::condicionOjo($oiEsf, $oiCil);
        if ($condOD === $condOI) {
            return $condOD; //Revisar esta condición
        }

        $esfOD = self::evalEsfera($odEsf);
        $esfOI = self::evalEsfera($oiEsf);

        $antimetropia =
            ($esfOD === 'MIOPÍA' && $esfOI === 'HIPERMETROPÍA') ||
            ($esfOD === 'HIPERMETROPÍA' && $esfOI === 'MIOPÍA');

        if ($antimetropia) {
            return 'ANTIMETROPÍA';
        }

        $exactamenteUnoEmetrope = ($esfOD === 'EMÉTROPE') xor ($esfOI === 'EMÉTROPE');
        if ($exactamenteUnoEmetrope) {
            return 'ANISOMETRÍA SIMPLE';
        }

        return null; // sin categoría definida (equivalente a #N/A)
    }

    /** PRESBICIA (AZ): si 1 <= Add <= 3 ⇒ "PRESBICIA", si no ⇒ "" */
    public static function presbicia(mixed $add): string
    {
        $v = self::toFloatOrNull($add);
        if ($v === null) return '';
        return ($v >= 1 && $v <= 3) ? 'PRESBICIA' : '';
    }

    /** MIOPÍA MAGNA (BA): si OD Esf <= -6 o OI Esf <= -6 ⇒ "MIOPÍA MAGNA" */
    public static function miopiaMagna(mixed $odEsf, mixed $oiEsf): string
    {
        $od = self::toFloatOrNull($odEsf);
        $oi = self::toFloatOrNull($oiEsf);
        if (($od !== null && $od <= -6) || ($oi !== null && $oi <= -6)) {
            return 'MIOPÍA MAGNA';
        }
        return '';
    }

    /**
     * Método de conveniencia: mete los datos crudos y te devuelve TODO junto.
     * $data = ['od_esf'=>..., 'od_cil'=>..., 'oi_esf'=>..., 'oi_cil'=>..., 'add'=>...]
     */
    public static function evaluate(array $data): array
    {
        $odEsf = $data['od_esf'] ?? null;
        $odCil = $data['od_cil'] ?? null;
        $oiEsf = $data['oi_esf'] ?? null;
        $oiCil = $data['oi_cil'] ?? null;
        $add   = $data['add'] ?? null;

        $aq = self::evalEsfera($odEsf);
        $ar = self::evalEsfera($oiEsf);
        $at = self::evalCil($odCil);
        $au = self::evalCil($oiCil);
        $as = $aq === $ar ? 'IGUAL' : 'DIFERENTE';
        $av = $at === $au ? 'IGUAL' : 'DIFERENTE';
        $aw = self::condicionOjo($odEsf, $odCil);
        $ax = self::condicionOjo($oiEsf, $oiCil);
        $ay = self::evalGeneralOJ($odEsf, $odCil, $oiEsf, $oiCil);
        $az = self::presbicia($add);
        $ba = self::miopiaMagna($odEsf, $oiEsf);

        return [
            'AQ_EVAL_ESF_OD' => $aq,
            'AR_EVAL_ESF_OI' => $ar,
            'AS_EVAL_ESF'    => $as,
            'AT_EVAL_CIL_OD' => $at,
            'AU_EVAL_CIL_OI' => $au,
            'AV_EVAL_CIL'    => $av,
            'AW_COND_OD'     => $aw,
            'AX_COND_OI'     => $ax,
            'AY_EVAL_OJ'     => $ay, // puede venir null si no aplica
            'AZ_PRESBICIA'   => $az,
            'BA_MIOPIA_MAGNA'=> $ba,
        ];
    }
}
