

<div class="index-container p-4">

    <h4>Relação de Itens da categoria {{$cat->name}}:</h4>
    {{-- @if(!empty($message))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif --}}


    <table class="table table-sm table-bordered bg-white rounded shadow table-hover text-center">
        <thead class="thead-dark">
        <tr>
            <th style="width: 30px" scope="col">Cód.</th>
            <th style="width: 200px" scope="col">Nome do item</th>
            <th style="width: 80px" scope="col">Qde atual</th>
            <th style="width: 100px" scope="col">Qde mínima</th>
            <th style="width: 120px" scope="col">Custo</th>
            <th style="width: 120px" scope="col">Preço de Venda</th>
            <th style="width: 150px" scope="col">Categoria</th>

            <th style="width: 180px" scope="col" class="justify-center">Ações</th>
        </tr>
        </thead>
        <tbody>

    @foreach($items as $item)
        <tr>
            <th scope="row"><button class="btn btn-sm btn-secondary rounded">
                    <a  style="color: whitesmoke" href="/items/mostrar/{{$item->id}}"> {{$item->id}} </a> </button> </th>
            <td class="text-left"> <a  style="color: #2C3033" href="/items/mostrar/{{$item->id}}">
                    {{$item->name}} </a></td>
            <td>{{$item->qty}}</td>
            <td>{{$item->minimum_qty}}</td>
            <td>{{$item->paid_price}}</td>
            <td>{{$item->new_price}}</td>
            <td>{{$item->category}}</td>

            <td>
                @include('site.items.actions')
            </td>
        </tr>
    @endforeach
        </tbody>

    </table>

    <a href="/items/criar/{{$cat->id_category}}" class="btn btn-info mb-2 btn-shadow">Adicionar novo Item na categoria {{$cat->name}}</a>
    <a href="{{route('form_create_item')}}" class="btn btn-secondary ml-2 mb-2 btn-shadow ">Adicionar novo Item em outra categoria</a>
</div>
