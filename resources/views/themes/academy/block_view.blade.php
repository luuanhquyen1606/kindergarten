@extends('themes.' . config('theme.active') . '.layouts.block_view')
@section('content')
    <?php echo $block;?>
@endsection
