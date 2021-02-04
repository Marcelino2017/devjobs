@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacantes</h1>

    <form class="max-w-lg mx-auto my-10" action="" method="post">
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>
            <input id="titulo" type="text" class="p-3 bg-white-100 rounded form-input w-full @error('email') border-red-100 border @enderror" name="titulo" autocomplete="email" autofocus>
        </div>

        <div class="mb-5">  
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
            <select name="categoria" id="categoria" 
                    class="block appearance-none 
                        w-full border border-gray-200
                        text-gray-700 rounded leading-tight 
                        focus:uotline-none focus:bg-white 
                        focus:border-gray-500 p-3 bg-gray-100">
                <option desable selected>- Selecciona -</option>
                @foreach ($categorias as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-5">  
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
            <select name="experiencia" id="experiencia" 
                    class="block appearance-none 
                        w-full border border-gray-200
                        text-gray-700 rounded leading-tight 
                        focus:uotline-none focus:bg-white 
                        focus:border-gray-500 p-3 bg-gray-100">
                <option desable selected>- Selecciona -</option>
                @foreach ($experiencias as $exp)
                    <option value="{{ $exp->id }}">{{ $exp->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-5">  
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>
            <select name="ubicacion" id="ubicacion" 
                    class="block appearance-none 
                        w-full border border-gray-200
                        text-gray-700 rounded leading-tight 
                        focus:uotline-none focus:bg-white 
                        focus:border-gray-500 p-3 bg-gray-100">
                <option desable selected>- Selecciona -</option>
                @foreach ($ubicaciones as $ubi)
                    <option value="{{ $ubi->id }}">{{ $ubi->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-5">  
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salarios:</label>
            <select name="salario" id="salario" 
                    class="block appearance-none 
                        w-full border border-gray-200
                        text-gray-700 rounded leading-tight 
                        focus:uotline-none focus:bg-white 
                        focus:border-gray-500 p-3 bg-gray-100">
                <option desable selected>- Selecciona -</option>
                @foreach ($salarios as $sal)
                    <option value="{{ $sal->id }}">{{ $sal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">  
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Drescipción del Puesto :</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>

            <input type="hidden" name="descripcion" id="descripcion">
        </div>  
        <button type="submit" class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
            Pubicar Vacante
        </button>
    </form>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.js" integrity="sha512-aCPwYkaP9S5CeLKGxJDPs1soJuQd+Dza60RzTsXRDzexppY0U25fSyCuPlOo8HH9kIuVS6uSunEMI4OG96+4gg==" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: [  'bold', 'italic', 'underline', 
                                'quote', 'anchor', 'justifyLeft', 
                                'justifyCenter', 'justifyRight', 
                                'justifyFull', 'orderedList', 
                                'unorderedList', 'h2', 'h3'
                            ],
                    static: true,
                    sticky: true,
                },
                placeholder: {
                    text: 'Inoformacion de la vacante'
                }
            }); 

            editor.subscribe('editableInput', function (eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })
        });
    </script>
@endsection