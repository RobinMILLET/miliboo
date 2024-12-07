@extends("layouts.app")
@section('title', 'Erreur')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/erreur.css')}}" />
@endsection

@section('content')
    <div id="content-erreur">
        <img id="img-erreur" src="/img/erreur.png" alt="">
        <a href="{{ route('homepage') }}"><h2 id="title-erreur">Une erreur est survenue, veuillez réessayer plus tard</h2></a>
    </div>
@endsection