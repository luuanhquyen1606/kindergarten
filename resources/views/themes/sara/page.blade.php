@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
    <?php
    foreach ($blocks as $block)
    {
        echo $block;
    }
    ?>
@endsection
