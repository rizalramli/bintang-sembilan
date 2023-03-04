@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>

@php
$configData = Helper::applClasses(); 
$company = \Modules\Master\Models\Company::find(1);
@endphp

<html translate="no" class="loading {{ ($configData['theme'] === 'light') ? '' : $configData['layoutTheme']}}" lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif" data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}" @if($configData['theme']==='dark' ) data-layout="dark-layout" @endif>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="author" content="toolsindo">
  <title>{{ $company->name }} - @yield('title') </title>
  <link rel="apple-touch-icon" href="{{ asset('images/logo/' . $company->logo) }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/' . $company->logo) }}">
  <link href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <style type="text/css">
    @font-face {
      font-family: NunitoSans-SemiBold;
      src: url('{{ asset('fonts/nunito/NunitoSans-SemiBold.ttf')}}');
    }

    body {
      font-family: NunitoSans-SemiBold !important;
    }

    .text-custom {
      font-family: NunitoSans-SemiBold !important;
    }
  </style>

  @include('panels/styles')
  @include('layouts/partials/style')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@isset($configData["mainLayoutType"])
@extends((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts.horizontalLayoutMaster' :
'layouts.verticalLayoutMaster' ))
@endisset