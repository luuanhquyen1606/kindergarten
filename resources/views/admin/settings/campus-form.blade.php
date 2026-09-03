<div class="mb-3">
  <label class="form-label" for="campus_name_{{ $campus->id ?? 'new' }}">Tên cơ sở</label>
  <input class="form-control" id="campus_name_{{ $campus->id ?? 'new' }}" name="name" type="text" value="{{ old('name', $campus->name ?? '') }}" required>
  <div class="invalid-feedback"></div>
</div>
<div class="mb-3">
  <label class="form-label" for="campus_address_{{ $campus->id ?? 'new' }}">Địa chỉ</label>
  <input class="form-control" id="campus_address_{{ $campus->id ?? 'new' }}" name="address" type="text" value="{{ old('address', $campus->address ?? '') }}">
  <div class="invalid-feedback"></div>
</div>
<div class="mb-3">
  <label class="form-label" for="campus_phone_{{ $campus->id ?? 'new' }}">Điện thoại</label>
  <input class="form-control" id="campus_phone_{{ $campus->id ?? 'new' }}" name="phone" type="text" value="{{ old('phone', $campus->phone ?? '') }}">
  <div class="invalid-feedback"></div>
</div>
<div class="mb-3">
  <label class="form-label" for="campus_email_{{ $campus->id ?? 'new' }}">Email</label>
  <input class="form-control" id="campus_email_{{ $campus->id ?? 'new' }}" name="email" type="email" value="{{ old('email', $campus->email ?? '') }}">
  <div class="invalid-feedback"></div>
</div>
<div class="mb-3">
  <label class="form-label" for="campus_map_{{ $campus->id ?? 'new' }}">Bản đồ nhúng</label>
  <textarea class="form-control" id="campus_map_{{ $campus->id ?? 'new' }}" name="google_map" rows="4">{{ old('google_map', $campus->google_map ?? '') }}</textarea>
  <div class="invalid-feedback"></div>
</div>
<input type="hidden" name="redirect_url"  value="/admin/settings">
<button class="btn btn-primary w-100" type="submit">{{ $submitLabel }}</button>