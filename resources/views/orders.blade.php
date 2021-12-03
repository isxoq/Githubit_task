@extends("layouts.main")

@section("extra")
    <br>
    <a href="{{url("/")}}" class="btn btn-warning">Qaytish</a>
{{--    <a href="{{url("/client/orders/create/{$client->id}")}}" class="btn btn-success">Zakaz yaratish</a>--}}
    <br>
@endsection

@section("content")
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Summa</th>
            <th scope="col">Status</th>
            <th scope="col">Vaqt</th>
        </tr>
        </thead>
        <tbody>

        @foreach($client->orders as $order)

            <tr data-bs-toggle="collapse" href="#collapseExample">
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->getTotalAmount()}}</td>
                <td>{!!$order->getStatusLabel()!!}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <p>
                        <a class="btn btn-info" data-bs-toggle="collapse" href="#collapse_{{$order->id}}" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Olingan mahsulotlar (Transactions)
                        </a>
                    </p>
                    <div class="collapse" id="collapse_{{$order->id}}">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Nomi</th>
                                <th scope="col">Summasi</th>
                                <th scope="col">Soni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>



        @endforeach
        </tbody>
    </table>
@endsection
