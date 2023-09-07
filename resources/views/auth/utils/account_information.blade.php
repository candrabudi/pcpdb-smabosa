<div id="accountDetailsValidation" class="content">
    <div class="content-header mb-4">
        <h3 class="mb-1">Registrasi Siswa</h3>
        <p>Masukan Data Diri Kamu.</p>
    </div>
    <div class="row g-3">
        <div class="col-sm-6">
            <label class="form-label" for="full_name">Nama Lengkap</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Takane Sachio" />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="user_email">Email</label>
            <input type="email" name="user_email" id="user_email" value="{{ old('user_email') }}" class="form-control" placeholder="takane@example.com" />
        </div>
        <div class="col-sm-6 form-password-toggle">
            <label class="form-label" for="user_password">Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="user_password" name="user_password" value="{{ old('user_password') }}" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="user_password2" />
                <span class="input-group-text cursor-pointer" id="user_password2"><i class="ti ti-eye-off"></i></span>
            </div>
        </div>
        <div class="col-sm-6 form-password-toggle">
            <label class="form-label" for="user_confirm_password">Konfirmasi Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="user_confirm_password" name="user_confirm_password" value="{{ old('user_confirm_password') }}" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="user_confirm_password2" />
                <span class="input-group-text cursor-pointer" id="user_confirm_password2"><i class="ti ti-eye-off"></i></span>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev" disabled>
                <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Kembali</span>
            </button>
            <a class="btn btn-primary btn-next text-white">
                <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Lanjut</span>
                <i class="ti ti-arrow-right ti-xs"></i>
            </a>
        </div>
        <a href="{{route('login')}}" class="text-primary">Sudah punya akun ?</a>
    </div>
</div>