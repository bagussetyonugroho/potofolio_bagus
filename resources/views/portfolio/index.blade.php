@extends('layouts.portfolio')

@section('content')
    @include('portfolio.partials.navbar')

    <main>
        @include('portfolio.partials.hero')
        @include('portfolio.partials.about')
        @include('portfolio.partials.projects')
        @include('portfolio.partials.certificates')
        @include('portfolio.partials.tech-stack')
        @include('portfolio.partials.comments')
        @include('portfolio.partials.contact')
    </main>
@endsection
