@extends('admin.layouts.app')
@section('content')

<div class="mb-7">
    <h2>{{ $parent->name }}</h2>
    <p>Email: {{ $parent->email }}</p>
    <p>Điện thoại: {{ $parent->phone }}</p>
    <p>Giới tính: {{ $parent->gender=='male' ? 'Nam' : 'Nữ' }}</p>

    <a href="/admin/parents/{{ $parent->id }}/edit" class="btn btn-primary">Sửa</a>
    <a href="/admin/parents" class="btn btn-phoenix-secondary">Quay về</a>
</div>
@endsection
