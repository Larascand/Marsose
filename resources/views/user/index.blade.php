@extends('user.layouts.template')

@section('content')
<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background-color: #fff;">
    <!--begin::Content-->
    <div class="my-2 me-5">
        <!--begin::Title-->
        <div class="fs-1 fs-lg-2qx fw-bold mb-2">Selamat Datang, 
        <span class="fw-normal">nama user</span></div>
        <!--end::Title-->
        <!--begin::Description-->
        <div class="fs-6 fs-lg-5 fw-semibold opacity-75">Laporkan keluhan anda dengan platform marsose</div>
        <!--end::Description-->
    </div>
    <!--end::Content-->
    <!--begin::Image-->
    <img src="assets/media/logos/gambar-city.svg" alt="Image Description" class="img-fluid"/>
    <!--end::Image-->
</div>

<!--begin::List Widget 5-->
<div class="row g-5 mt-5">
    <div class="col-xl-4">
        <div class="card mt-10 h-100" style="background-color: #1B283F; background-image: url('assets/media/logos/rhone.svg'); background-repeat: no-repeat; background-size: cover;">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bold mb-2 text-light pt-10" style="font-size: 24px; padding-bottom: 12px;">Laporkan Keluhan</span>
                    <span class="text-muted fw-semibold" style="font-size: 16px;">Anda dapat melaporkan segala bentuk keluhan anda di lingkungan marsose RW 03</span>
                </h3>
            </div>            
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5">
                <button class="btn" style="background-color: #F64E60; color:#fff;">Buat Laporan</button>
            </div>
            <!--end: Card Body-->
        </div>        
    </div>    

    <div class="col-xl-4">
        <div class="card mt-10 h-100">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bold mb-2 text-dark">Alur Laporan</span>
                    <span class="text-muted fw-semibold fs-7">Langkah-langkah membuat laporan</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::Timeline-->
                <div class="timeline-label">
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <!--begin::Label-->
                        <div class="timeline-label fw-bold text-gray-800 fs-6">Step 1</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-info fs-1"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Text-->
                        <div class="fw-bold timeline-content ps-3">Buka Fitur Laporan Warga <br>
                            <span class="text-muted fw-semibold">Akses fitur laporan yang tersedia.</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <!--begin::Label-->
                        <div class="timeline-label fw-bold text-gray-800 fs-6">Step 2</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-success fs-1"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Content-->
                        <div class="fw-bold timeline-content ps-3">Isi Formulir Pengaduan <br>
                            <span class="text-muted fw-semibold">Lengkapi formulir dengan detail. Pastikan semua informasi diisi dengan jelas.</span>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <!--begin::Label-->
                        <div class="timeline-label fw-bold text-gray-800 fs-6">Step 3</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-danger fs-1"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Desc-->
                        <div class="fw-bold timeline-content ps-3">Proses Verifikasi <br>
                            <span class="text-muted fw-semibold">Laporan akan diverifikasi oleh RW untuk menentukan diterima atau ditolak.</span>
                        </div>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <!--begin::Label-->
                        <div class="timeline-label fw-bold text-gray-800 fs-6">Step 4</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-primary fs-1"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Text-->
                        <div class="fw-bold timeline-content ps-3">Tindak Lanjut dan Musyawarah <br>
                            <span class="text-muted fw-semibold">Jika diterima, laporan akan dibahas dalam musyawarah dengan RT, RW, dan warga terkait.</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <!--begin::Label-->
                        <div class="timeline-label fw-bold text-gray-800 fs-6">Step 5</div>
                        <!--end::Label-->
                        <!--begin::Badge-->
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-warning fs-1"></i>
                        </div>
                        <!--end::Badge-->
                        <!--begin::Desc-->
                        <div class="fw-bold timeline-content ps-3">Penyelesaian <br>
                            <span class="text-muted fw-semibold">Setelah musyawarah, tindakan selanjutnya dilakukan untuk menyelesaikan laporan.</span>
                        </div>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Timeline-->
            </div>
            <!--end: Card Body-->
        </div>
    </div>

    <!--begin::List Surat-->
    <div class="col-xl-2">
        <div class="row">
            <div class="card mt-10 mb-4">
                <div class="card-body text-center">
                    <h3 class="fw-bold mb-4 pt-4" style="color: #181C32;">Surat Surat</h3>
                    <a href=""><img src="assets/media/icons/icon-surat.svg" alt="Image" class="img-fluid mb-4 pt-lg-20"></a>
                </div>
            </div>            

            <div class="card mb-4">
                <div class="card-body text-center">
                    <h3 class="fw-bold mb-4 pt-4" style="color: #181C32;">Surat Surat</h3>
                    <a href=""><img src="assets/media/icons/icon-surat.svg" alt="Image" class="img-fluid mb-4 pt-lg-20"></a>
                </div>
            </div>
        </div>        
    </div>

    <div class="col-xl-2">
        <div class="row">
            <div class="card mt-10 mb-4">
                <div class="card-body text-center">
                    <h3 class="fw-bold mb-4 pt-4" style="color: #181C32;">Surat Surat</h3>
                    <a href=""><img src="assets/media/icons/icon-surat.svg" alt="Image" class="img-fluid mb-4 pt-lg-20"></a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body text-center">
                    <h3 class="fw-bold mb-4 pt-4" style="color: #181C32;">Surat Surat</h3>
                    <a href=""><img src="assets/media/icons/icon-surat.svg" alt="Image" class="img-fluid mb-4 pt-lg-20"></a>
                </div>
            </div>
        </div>        
    </div>
</div>

<div class="justify-content-center flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13 mt-18" style="background-color: #fff;">
    <!--begin::Content-->
    <div class="my-2 me-5 text-center">
        <div class="fs-1 fs-lg-2qx fw-bold mb-2">Data Laporan Warga</div>
        <div class="fs-6 fs-lg-5 fw-semibold opacity-75">Seluruh Laporan Terbaru</div>
    </div>
    <!--end::Content-->

    <!--begin::Table-->
    <table class="table mt-4">
        <thead>
            <tr style="background-color: #1B283F; color: #fff;" class="rounded">
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Laporan</th>
                <th scope="col">Gambar</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>John Doe</td>
                <td>2024-04-29</td>
                <td>Pencurian di depan rumah</td>
                <td>gambar.jpg</td>
                <td>Barang yang dicuri adalah sepeda motor</td>
                <td>Menunggu Verifikasi</td>
            </tr>
        </tbody>
    </table>
    <!--end::Table-->    
</div>
@endsection