@extends('layouts.master')

@section('title', 'Admin Profile')

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Admin profile
                </h1>
                <ul>
                    <li>
                        Nome: {{ $user['name'] }}
                    </li>
                    <li>
                        Email: {{ $user['email'] }}
                    </li>
                    <li>
                        Creato: {{ $user['created_at'] }}
                    </li>
                    <li>
                        Modificato: {{ $user['updated_at'] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection