@extends("layouts.main")

@section("content")
<h1>Mijozlar</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ismi</th>
            <th scope="col">Familiyasi</th>
            <th scope="col">Phone</th>
            <th scope="col">Harakatlar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <a href="{{url("/client/orders/{$user->id}")}}" class="btn btn-primary">Mijoz zakazlari</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
