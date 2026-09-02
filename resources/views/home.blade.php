@props([
    'services' => collect(),
])

@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-hero />

<x-welcome />

<x-services-section :services="$services" />

@endsection