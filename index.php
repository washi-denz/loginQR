<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Generar QR</title>
  </head>
  <body>    
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <label for="">Link o texto</label>
                <input type="text" id="texto" class="form-control">
            </div>
            <div class="col">
                <button class="btn btn-primary" id="enviar_qr">Enviar</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script>
      let enviar = document.querySelector('#enviar_qr');

      enviar.addEventListener('click',e=>{
        e.preventDefault();

        let link  = document.querySelector('#texto');
        let datos =  new FormData();

        datos.append('link',link);

        let peticion = {
          method:'POST',
          body:datos
        }
        console.log(peticion);
        
        fetch('php/generar-qr.php',peticion)
        .then(respuesta => respuesta.json())
        .then(respuesta => {
          console.log(respuesta);
          
          let  a = document.createElement('a');
          a.href = respuesta.file;
          a.download = "mi_qr.png";
          a.click();
          
        }).catch(error=>{
          
        })

      })
    </script>
  </body>
</html>