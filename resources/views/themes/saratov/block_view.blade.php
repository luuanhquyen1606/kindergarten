@extends('themes.' . config('theme.active') . '.layouts.block_view')
@section('content')
    <?php echo $block;?>
    <script type="text/javascript">
window.addEventListener('load', () => {
    const observer = new ResizeObserver(() => {
        parent.resizeMyIframe();
    });

    observer.observe(document.body);
});
</script>
@endsection
