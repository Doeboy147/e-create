@extends('layouts.email')
@section('content')
    <table class="container">
        <tbody>
        <tr>
            <td class="logoSection">
                <strong> Price alert</strong>
            </td>
        </tr>
        <tr>
            <td class="section">
                <p>
                    {!! $data->body !!}
                </p>
            </td>
        </tr>
        <tr>
            <td class="section">
                <p>Have a great day!</p>
            </td>
        </tr>
        </tbody>
    </table>
@stop