@extends('site.layouts.app')

@section('site_content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Meus pedidos</h3>
                <div class="table-responsive shadow card rounded-3 p-0 m-0 mt-5 mb-5">
                    <table class="table table-bordered rounded-3 border overflow-hidden p-0 m-0">
                        <thead>
                            <tr>
                                <th>Data do pedido</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userOrders as $userOrder)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($userOrder->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('site.show.product', $userOrder->product_id) }}">
                                            <img src="{{ asset('storage/images/' . $userOrder->product_image) }}" alt="{{ $userOrder->product_name }}" style="width: 50px; height: 50px; margin-right: 10px;">
                                        </a>
                                        {{ $userOrder->product_name }}
                                    </td>
                                    <td>{{ $userOrder->quantity }}</td>
                                    <td>{{ 'R$ ' . number_format($userOrder->total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
