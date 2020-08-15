@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>
                Homepage
                </h4>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Lundi</th>
                            <th scope="col">Mardi</th>
                            <th scope="col">Mercredi</th>
                            <th scope="col">Jeudi</th>
                            <th scope="col">Vendredi</th>
                            <th scope="col">Samedi</th>
                            <th scope="col">Dimanche</th>
                        </tr>
                    </thead>
                    @for($i = 0; $i < 10; $i++)
                        <tr>
                            <td>{{ $i+8 }}h-{{ $i+9 }}h</td>
                            @for($j = 0; $j < 7; $j++)
                                @if($i == 4)
                                    <td class="table-dark"></td>
                                @else
                                    <td></td>
                                @endif
                            @endfor
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
@endsection
