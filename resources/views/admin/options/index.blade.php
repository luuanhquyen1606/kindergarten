@extends('admin.layouts.app')
@section('content')
<form class="ajax_form" action="/admin/options" class="mb-9" method="POST" >
      @csrf
<div class="row">
    <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
           <div class="col-auto">
              <h2 class="mb-2">Website Options</h2>

            </div>
            <div class="col-auto">
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Save Changes</button>
            </div>

    </div>
 
    <div class=" col-xl-12" > 
        <div class="card shadow-none border my-4" data-component-card="data-component-card">
                 
                  <div class="card-body p-0">
                    
                    <div class="p-4 code-to-copy">



                        <?php
                        
                        foreach($options as $option)
                        {
                                if( $option->type=='text')
                                {
                        ?>

                        <div class="input-group" style="margin-bottom: 10px;">
                            <span class="input-group-text" style="width: 25%;">{{$option->name}}</span>
                            <input class="form-control" name="{{$option->key}}" value="{{$option->data}}" type="text" aria-label="First name">
                            <div class="invalid-feedback"></div>
                        </div>

                        <?php

                                }
                                if( $option->type=='photo')
                                {
                                    ?>
                                    <div class="row">
                                        <div class="col-3">
<lable class="form-lable">{{$option->name}}</lable> 
                                        </div>
                                        <div class="col-9">
<div class="mb-4">
                                        
                                        <div id="feature_file" class="d-flex align-items-end position-relative">
                                        
                                                <div class="hoverbox" style="width: 100%;">
                                                <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                                                <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                                                <div class="avatar avatar-5xl">
                                                    <img preview-input-id="{{$option->key}}"  class="rounded-square" src="{{ is_numeric($option->data) ? getPhotoUrl($option->data) : '' }}" alt="" /></div>
                                                <label class="w-100 h-100 position-absolute z-1" for="{{$option->key}}">
                                                </label>
                                                </div>
                                                
                                        </div>
                                        
                                        </div>
                                        <input  type="text" style="display: none;"  class="media-browser-input" id="{{$option->key}}"  name="{{$option->key}}"  value="{{$option->data}}">
                                            <div class="invalid-feedback"></div> 
                                    </div>
                                        </div>

                                    </div>
                                    
                                    
                                    
                                    <?php
                                }
                                if( $option->type=='offices')
                                {
                                    $offices = json_decode($option->data, true);
                                    if(!is_array($offices)){ $offices = []; }
                                    ?>
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">{{$option->name}}</label>
                                        <div id="offices-container">
                                            <?php foreach($offices as $office): ?>
                                            <div class="office-row border rounded p-3 mb-3 position-relative">
                                                <button type="button" class="btn btn-sm btn-outline-danger remove-office" style="position:absolute; top:10px; right:10px;"><i class="fa-solid fa-trash"></i></button>
                                                <div class="row g-2">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control office-name" value="{{ $office['name'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control office-address" value="{{ $office['address'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" class="form-control office-phone" value="{{ $office['phone'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control office-email" value="{{ $office['email'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-primary" id="add-office">Add Office</button>
                                        <input type="hidden" name="{{$option->key}}" id="offices-data" value="{{ $option->data }}">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <?php
                                }
                                if( $option->type=='social_networks')
                                {
                                    $socials = json_decode($option->data, true);
                                    if(!is_array($socials)){ $socials = []; }
                                    $networks = ['facebook' => 'Facebook', 'linkedin' => 'Linkedin', 'instagram' => 'Instagram', 'youtube' => 'Youtube'];
                                    $socialMap = [];
                                    foreach($socials as $social){
                                        if(isset($social['network'])){ $socialMap[$social['network']] = $social['url'] ?? ''; }
                                    }
                                    ?>
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">{{$option->name}}</label>
                                        <div id="social-networks-container">
                                            <?php foreach($networks as $networkKey => $networkLabel): ?>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" style="width: 25%;">{{ $networkLabel }}</span>
                                                <input type="text" class="form-control social-network-url" data-network="{{ $networkKey }}" value="{{ $socialMap[$networkKey] ?? '' }}">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <input type="hidden" name="{{$option->key}}" id="social-networks-data" value="{{ $option->data }}">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>


                    </div>
                  </div>
                </div>
      
    </div>
                    

    <div class="col-md-4 col-xl-4 col-xxl-4 gy-5 gy-md-3">  
                <div class="">
                 
                </div>   
    </div>
</div>
 @include('admin.pages.media_browser')
</form>
<style>
#navigation_table tr td {padding:1rem 0rem} 
.child {background-color:rgba(203, 208, 221, 0.15)} 
.grandchild{background-color:rgba(248, 248, 250, 0.15)}
</style>
@endsection



@section('js')
<script type="text/javascript">

function officeRowHtml(office) {
    office = office || {name: '', address: '', phone: '', email: ''};
    return '<div class="office-row border rounded p-3 mb-3 position-relative">' +
        '<button type="button" class="btn btn-sm btn-outline-danger remove-office" style="position:absolute; top:10px; right:10px;"><i class="fa-solid fa-trash"></i></button>' +
        '<div class="row g-2">' +
            '<div class="col-md-3">' +
                '<label class="form-label">Name</label>' +
                '<input type="text" class="form-control office-name" value="' + $('<div>').text(office.name).html() + '">' +
            '</div>' +
            '<div class="col-md-3">' +
                '<label class="form-label">Address</label>' +
                '<input type="text" class="form-control office-address" value="' + $('<div>').text(office.address).html() + '">' +
            '</div>' +
            '<div class="col-md-3">' +
                '<label class="form-label">Phone</label>' +
                '<input type="text" class="form-control office-phone" value="' + $('<div>').text(office.phone).html() + '">' +
            '</div>' +
            '<div class="col-md-3">' +
                '<label class="form-label">Email</label>' +
                '<input type="text" class="form-control office-email" value="' + $('<div>').text(office.email).html() + '">' +
            '</div>' +
        '</div>' +
    '</div>';
}

$(document).on("click", "#add-office", function () {
    $("#offices-container").append(officeRowHtml());
});

$(document).on("click", ".remove-office", function () {
    $(this).closest(".office-row").remove();
});

function serializeOffices() {
    var offices = [];
    $("#offices-container .office-row").each(function () {
        offices.push({
            name: $(this).find(".office-name").val(),
            address: $(this).find(".office-address").val(),
            phone: $(this).find(".office-phone").val(),
            email: $(this).find(".office-email").val()
        });
    });
    $("#offices-data").val(JSON.stringify(offices));
}

function serializeSocialNetworks() {
    var socials = [];
    $("#social-networks-container .social-network-url").each(function () {
        socials.push({
            network: $(this).data("network"),
            url: $(this).val()
        });
    });
    $("#social-networks-data").val(JSON.stringify(socials));
}

$(".ajax_form").on("submit", function (e) {
    e.preventDefault();        // stop full page reload

    serializeOffices();
    serializeSocialNetworks();

    var formData = new FormData(this);
    $(".invalid-feedback").html('');
    $("input").removeClass("is-invalid");

    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            window.location.reload();
        },

        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(field, msgs) {
                    $("[name='" + field + "']").addClass("is-invalid");
                    $("[name='" + field + "']").siblings(".invalid-feedback").html(msgs);
                });
            }
        }
    });
});

</script>
@endsection
