@extends('admin.layouts.app')
@section('content')



<div class="card" style="margin-bottom:10px !important">
    <div class="card-header pb-3">
                <div class="row justify-content-between g-3">
                  <div class="col-auto">
                    <h3 class="text-body-highlight">{{ $page->name }}</h3>
                    <p class="mb-0"></p>
                  </div>
                  <div class="col-auto"> 
                    <a href="/admin/pages/{{ $page->id }}/edit" class="btn btn-sm btn-phoenix-primary code-btn ms-2 collapsed" type="submit">Thay đổi</a>
                </div>
                </div>
              </div>
            <div class="card-body">
            <iframe id="page_preview" src="https://mamnonbanmai.blog"  style=" width: 100%;height: 100px;border: none;overflow: hidden;display: block;" ></iframe>
           
            </div>
</div> 
    
 

@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {
   var iframe = $('#page_preview');
 
  iframe.on('load', function() {
      var contentHeight = iframe.contents().find('body').prop('scrollHeight');
      iframe.height((contentHeight+10));
  });
});
</script> 
@endsection