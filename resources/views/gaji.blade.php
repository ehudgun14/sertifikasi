<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
        $(function(){
            $(document).on('click', '.tabelgaji', function(){
                var gaji = $(this).closest('tr');
                var email = gaji.find("td:eq(0)").html();
                var nomor = gaji.find("td:eq(1)").html();
                var nama = gaji.find("td:eq(2)").html();
                var jabatan = gaji.find("td:eq(3)").html();
                var gaji_pokok = gaji.find("td:eq(4)").html();
                var penyesuaian =  gaji.find("td:eq(5)").html();
                var penyesuaian_pendidikan =  gaji.find("td:eq(6)").html();
                var gaji_pokok2 =  gaji.find("td:eq(7)").html();
                var tunjangan_jabatan = gaji.find("td:eq(8)");
                var tunjangan_kepangkatan = gaji.find("td:eq(9)");
                var tunjangan_transport = gaji.find("td:eq(10)");
                var kelebihan_jam = gaji.find("td:eq(11)");
                var rapelan = gaji.find("td:eq(12)");
                var gaji_bruto = gaji.find("td:eq(13)");
                var dplk = gaji.find("td:eq(14)");
                var potongan_bpjs_kes = gaji.find("td:eq(15)");
                var potongan_bpjs_jht = gaji.find("td:eq(16)");
                var potongan_bpjs_pensiun = gaji.find("td:eq(17");
                var piutang_karyawan = gaji.find("td:eq(18)");
                var piutang_karyawan_koperasi = gaji.find("td:eq(19)");
                var simpanan_pokok = gaji.find("td:eq(20)");
                var potongan_pajak = gaji.find("td:eq(21)");
                var potongan_arisan = gaji.find("td:eq(22)");
                var take_home_pay = gaji.find("td:eq(23)");

                $.ajax({
                        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                        url:"{{ route('kirimemail')}}",
                        data:{
                            "gaji" : gaji,
                            "email" : email,
                            "nomor" : nomor,
                            "nama" : nama,
                            "jabatan" : jabatan,
                            "gaji_pokok" : gaji_pokok,
                            "penyesuaian" : penyesuaian,
                            "penyesuaian_pendidikan" : penyesuaian_pendidikan,
                            "gaji_pokok2" : gaji_pokok2,
                            "tunjangan_jabatan" : tunjangan_jabatan,
                            "tunjangan_kepangkatan" : tunjangan_kepangkatan,
                            "tunjangan_transport" : tunjangan_transport,
                            "kelebihan_jam" : kelebihan_jam,
                            "rapelan" : rapelan,
                            "gaji_bruto" : gaji_bruto,
                            "dplk" : dplk,
                            "potongan_bpjs_kes" : potongan_bpjs_kes,
                            "potongan_bpjs_jht" : potongan_bpjs_jht,
                            "potongan_bpjs_pensiun" : potongan_bpjs_pensiun,                           
                            "piutang_karyawan" : piutang_karyawan,
                            "piutang_karyawan_koperasi" : piutang_karyawan_koperasi,
                            "simpanan_pokok" : simpanan_pokok,
                            "potongan_pajak" : potongan_pajak,
                            "potongan_arisan" : potongan_arisan,
                            "take_home_pay" : take_home_pay,
                        },
                        type:'post',
                        cache:false,
                        dataType: 'JSON',
                        success: function(data){
                           alert("Sukses");
                        }
                    });

            });
        });
        </script>        
    </head>
    <body class="antialiased">
    @if($user == 'none' || $user == 'none')
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('gaji') }}">Gaji<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            </nav>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card border-0 shadow-sm rounded bg-secondary">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="d-flex flex-row">
                                <form action="{{ route('kirimemail') }}" method="post" accept-charset="UTF-8"  enctype='multipart/form-data'>
                                @csrf 
                                    <input type="file" id="filegaji" name="filegaji" value="{{ $file }}" hidden>
                                    <button class="btn btn-primary"type="submit">
                                        Kirim Semua
                                    </button>
                                </form>
                                <form action="{{ route('deleteimport') }}" method="post" accept-charset="UTF-8" style="margin-left:10px">
                                @csrf 
                                    <button class="btn btn-warning"type="submit">
                                        Hapus Semua
                                    </button>
                                </form>
                                <form action="{{ route('impor') }}" method="post" accept-charset="UTF-8" style="margin-left:10px"  enctype='multipart/form-data'>
                                @csrf 
                                    <div class="d-flex flex-row">
                                    <button class="btn btn-success"type="submit">
                                        Import CSV
                                    </button>
                                    <input class='form-control' name='csvfile' id='csvfile' type='file' required='' placeholder='File'>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <br>
                            <p> Tekan baris tabel untuk mengirim email individual</p>
                            <div class="col-12 table-responsive"  style='overflow: scroll;'>
                            <table class="table table-bordered bg-light" style="display: table;max-width:100%;white-space:nowrap;" id="tabelgaji">
                                <thead>
                                    <tr>
                                        <th scope="col">PEGAWAI</th>
                                        <th scope="col">NO.</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">JABATAN</th>
                                        <th scope="col">GAJI POKOK</th>
                                        <th scope="col">PENYESUAIAN 2024</th>
                                        <th scope="col">PENYESUAIAN PENDIDIKAN</th>
                                        <th scope="col">GAJI POKOK</th>
                                        <th scope="col">TUNJANGAN JABATAN</th>
                                        <th scope="col">TUNJANGAN KEPANGKATAN</th>
                                        <th scope="col">TUNJANGAN TRANSPORT/TUNJAKAN KELANGKAAN</th>
                                        <th scope="col">KELEBIHAN JAM/NGAJAR MALAM/SERTIFIKASI</th>
                                        <th scope="col">RAPELAN</th>
                                        <th scope="col">GAJI BRUTO+TUNJAB+KELEBIHAN JAM</th>
                                        <th scope="col">DPLK</th> 	
                                        <th scope="col">POTONGAN BPJS KESEHATAN</th> 	
                                        <th scope="col">POTONGAN BPJS JHT</th> 	
                                        <th scope="col">POTONGAN BPJS PENSIUN</th> 	
                                        <th scope="col">PIUTANG KARYAWAN</th>	
                                        <th scope="col">PIUTANG KARYAWAN KOPERASI</th> 	
                                        <th scope="col">SIMPANAN POKOK</th> 	
                                        <th scope="col">POTONGAN PAJAK</th>
                                        <th scope="col">POTONGAN ARISAN</th>
                                        <th scope="col">TAKE HOME PAY</th>	
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($gaji as $gajis)
                                        <tr class="tabelgaji">
                                            <td>{{ $gajis['email'] }}</td>
                                            <td>{{ $gajis['nomor'] }}</td>
                                            <td>{{ $gajis['nama'] }}</td>
                                            <td>{{ $gajis['jabatan'] }}</td>
                                            <td>{{ $gajis['gaji_pokok'] }}</td>
                                            <td>{{ $gajis['penyesuaian'] }}</td>
                                            <td>{{ $gajis['penyesuaian_pendidikan'] }}</td>
                                            <td>{{ $gajis['gaji_pokok2'] }}</td>
                                            <td>{{ $gajis['tunjangan_jabatan'] }}</td>
                                            <td>{{ $gajis['tunjangan_kepangkatan'] }}</td>
                                            <td>{{ $gajis['tunjangan_transport'] }}</td>
                                            <td>{{ $gajis['kelebihan_jam'] }}</td>
                                            <td>{{ $gajis['rapelan'] }}</td>
                                            <td>{{ $gajis['gaji_bruto'] }}</td>
                                            <td>{{ $gajis['dplk'] }}</td>
                                            <td>{{ $gajis['potongan_bpjs_kes'] }}</td>
                                            <td>{{ $gajis['potongan_bpjs_jht'] }}</td>
                                            <td>{{ $gajis['potongan_bpjs_pensiun'] }}</td>
                                            <td>{{ $gajis['piutang_karyawan'] }}</td>
                                            <td>{{ $gajis['piutang_karyawan_koperasi'] }}</td>
                                            <td>{{ $gajis['simpanan_pokok'] }}</td>
                                            <td>{{ $gajis['potongan_pajak'] }}</td>
                                            <td>{{ $gajis['potongan_arisan'] }}</td>
                                            <td>{{ $gajis['take_home_pay'] }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        @endif 
    </body>
</html>