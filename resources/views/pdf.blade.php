 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title></title>
 </head>
 <body>
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">{{ __(' Prescription') }}</div>
             <div class="card-body">
      
                 <div class="d-flex justify-content-center">
                     <div class="col-md-8">
                         <div class="d-flex justify-content-center mb-5">
                             <img src="{{ asset('frontEnd/img/logo.png') }}" alt="">
                         </div>
                         
                         <div class="form-group  ">
                             <label for="name" class="control-label">Name</label>
                             {{ $name }}
                         </div>                          
                     </div>
                 </div>
     
             </div>
         </div>
     </div>
     
 </body>
 </html>
