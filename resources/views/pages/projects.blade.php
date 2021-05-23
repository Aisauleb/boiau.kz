@extends('layouts.default')

@section('content')
    @php
        $h2 = "Проекты компании  \"Boiau CORP\" ";
        $nav_links=[
                [
                    'url'=>'/',
                    'text'=>'Главная'
                ]
                ];
        array_push($nav_links,
        [
            'url'=>'/projects',
            'text'=>'Проекты'
        ]);
    @endphp
    @include('includes.banner')
    @php
        $pad_top = "pad_top";
        $project_area_title = true;
        $project_area_h2 = "Последние проекты нашей компании";
        $project_area_p = "Это примерное описание проектов для тех кто углюбляеся.";
    @endphp
    @include('includes.projects_area')

@stop
