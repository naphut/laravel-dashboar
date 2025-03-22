@extends('layouts.app')

@section('title', 'Payment Types')
@section('header-title', 'Payment Types')

@section('content')
    <div class="widget">
        <h3>All Payment Types</h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymentTypes as $paymentType)
                        <tr>
                            <td>{{ $paymentType->Payment_Type_ID }}</td>
                            <td>{{ $paymentType->Payment_Type_Description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection