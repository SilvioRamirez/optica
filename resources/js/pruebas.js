var rows = '';

        $("#productTable > tbody").html("");
        /* if (tableLength > 0) {
        } else {
            $("#productTable > tbody").html("");
        } */

        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        const modalTitle = personaModal.querySelector('.modal-title')
        const modalBodyInput = personaModal.querySelector('.modal-body input')

        const listadoPersonas = personaModal.querySelector('listado-personas')

        modalTitle.textContent = `New message to ${recipient}`


        var url = SITEURL + '/api/fetch-personas';
        
        var tableLength = $("#productTable tbody tr").length;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            let data = response.data.personas;
            console.log(message, status, data);
            
            //alert(data[0].nombres);
            //alert(data.length);

            var el = document.getElementById('demo');
            //el.textContent = "I have changed!";

            for (var i=0, len = data.length; i < len; i++) { 
                //alert(i);
                //alert(data[i].apellidos);

                var id      = data[i].id;
                var cedula  = data[i].cedula;
                var nombres = data[i].nombres;
                var apellidos = data[i].apellidos;

                //el.textContent = nombres+' '+apellidos;
                rows += '<tr><td>'+id+'</td><td>'+cedula+'</td><td>'+nombres+'</td><td>'+apellidos+'</td><td>contenido de prueba</td></tr>';
                //rows += nombres+apellidos;
                //tr += '<select class="niceSelect form-control" name="product_id[]" id="productName' + count + '" style="display:none">' + '<option value="">Select Product</option>';

        }

        if (tableLength > 0) {
            $("#productTable tbody tr:last").after(rows);
        } else {
            $("#productTable tbody").append(rows);
        }

            //$("#productTable tbody tr:last").after(rows);
            
            //el.textContent = rows;
                
            /* for (var i=0; i < data.length; i++) {

                var nombres = data[i].nombres;
                var apellidos = data[i].apellidos;
                alert(nombres+apellidos);

                listadoPersonas.textContent = `Persona: ${nombres}`
                
                
                var el = document.createElement('option');

                el.textContent = opt;
                el.value = opt;

                sel.appendChild(el);
            }  */
        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });