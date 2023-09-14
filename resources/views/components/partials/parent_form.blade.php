<div class="card mb-4">
    <h5 class="card-header">{{ $title }}</h5>
    <hr class="my-0" />
    <div class="card-body">
        @csrf
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_parent_name" class="form-label">Nama {{ $title }}</label>
                <input class="form-control" type="text" id="{{ $parentType }}_parent_name" name="{{ $parentType }}_parent_name" value="{{ $parent->parent_name ?? old($parentType.'_parent_name') }}" autofocus />
            </div>

            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_birth_place" class="form-label">Tempat Lahir</label>
                <input class="form-control" type="text" id="{{ $parentType }}_birth_place" name="{{ $parentType }}_birth_place" value="{{ $parent->birth_place ?? old($parentType.'_birth_place') }}" autofocus />
            </div>

            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_birth_date" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" name="{{ $parentType }}_birth_date" value="{{ $parent->birth_date ?? old($parentType.'_birth_date') }}" placeholder="YYYY-MM-DD" id="flatpickr-date-{{ $parentType }}" />
            </div>
            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_education" class="form-label">Pendidikan</label>
                <select id="{{ $parentType }}_education" name="{{ $parentType }}_education" class="form-select select2" data-allow-clear="true">
                    <option value="">Pilih</option>
                    <option value="SD" {{optional($parent)->education === 'SD' ? 'selected' : ''}}>SD</option>
                    <option value="SMP" {{optional($parent)->education === 'SMP' ? 'selected' : ''}}>SMP</option>
                    <option value="SMA" {{optional($parent)->education === 'SMA' ? 'selected' : ''}}>SMA</option>
                    <option value="SMK" {{optional($parent)->education === 'SMK' ? 'selected' : ''}}>SMK</option>
                    <option value="S1" {{optional($parent)->education === 'S1' ? 'selected' : ''}}>S1</option>
                    <option value="S2" {{optional($parent)->education === 'S2' ? 'selected' : ''}}>S2</option>
                    <option value="S3" {{optional($parent)->education === 'S3' ? 'selected' : ''}}>S3</option>
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_religion" class="form-label">Agama</label>
                <select id="{{ $parentType }}_religion" name="{{ $parentType }}_religion" class="form-select select2" data-allow-clear="true">
                    <option value="">Pilih</option>
                    <option value="Islam" {{optional($parent)->religion == 'Islam' ? 'selected' : ''}}>Islam</option>
                    <option value="Kristen" {{optional($parent)->religion == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                    <option value="Katholik" {{optional($parent)->religion == 'Katholik' ? 'selected' : ''}}>Katholik</option>
                    <option value="Protestan" {{optional($parent)->religion == 'Protestan' ? 'selected' : ''}}>Protestan</option>
                    <option value="Budha" {{optional($parent)->religion == 'Budha' ? 'selected' : ''}}>Budha</option>
                    <option value="Hindu" {{optional($parent)->religion == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_profession" class="form-label">Pekerjaan</label>
                <input class="form-control" type="text" id="{{ $parentType }}_profession" name="{{ $parentType }}_profession" value="{{$parent->profession ?? old($parentType.'_profession') }}" autofocus />
            </div>
            <div class="mb-3 col-md-6">
                <label for="{{ $parentType }}_income" class="form-label">Pendapatan</label>
                <input class="form-control" type="number" id="{{ $parentType }}_income" name="{{ $parentType }}_income" value="{{$parent->income ??  old($parentType.'_income')}}" autofocus />
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="{{ $parentType }}_whatsapp_phone">Nomor Whatsapp</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                    <input type="number" id="{{ $parentType }}_whatsapp_phone" name="{{ $parentType }}_whatsapp_phone" class="form-control" value="{{$parent->whatsapp_phone ?? old($parentType.'_whatsapp_phone')}}" />
                </div>
            </div>
        </div>
    </div>
</div>