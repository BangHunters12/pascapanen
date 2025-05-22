@extends('layouts/admin.admin')



@section('content')
    <div class="container-fluid mt-0 p-3">

        <h2 class="fw-bold"></i> Dashboard</h2>
        <p class="text-muted">Ringkasan aktivitas pasca panen padi</p>

        <!-- Summary Cards -->
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white">
                    <i class="bi bi-people fs-2 mb-2"></i>
                    <h5>Total Petani</h5>
                    <p class="fs-3 fw-bold" id="petaniTotal"><span>{{$petani['Total']}}</span></p>
                    <span class="fs-6" id="petaniChanges">⬆ 12% dari bulan lalu</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white">
                    <i class="bi bi-cart-check fs-2 mb-2"></i>
                    <h5>Total Penjualan Padi</h5>
                    <p class="fs-3 fw-bold">Rp <span>{{ $penjualan['Total'] }}</span></p>
                    <span class="fs-6">⬆ 8% dari bulan lalu</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white">
                    <i class="bi bi-box-seam fs-2 mb-2"></i>
                    <h5>Produksi Beras</h5>
                    <p class="fs-3 fw-bold"><span>{{ $produksiBeras['TotalBerat'] }}</span> kg</p>
                    <span class="fs-6">⬆ 5% dari bulan lalu</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white">
                    <i class="bi bi-currency-dollar fs-2 mb-2"></i>
                    <h5>Total Pendapatan</h5>
                    <p class="fs-3 fw-bold">Rp <span>{{ $pendapatan['Total'] }}</span></p>
                    <span class="fs-6">⬆ 10% dari bulan lalu</span>
                </div>
            </div>
        </div>


        <!-- Tables -->
        {{-- <div class="row mt-3">
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm p-3">
                    <h5 class="text-center"><i class="bi bi-clock-history"></i> Penjualan Terbaru</h5>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Tanggal</th>
                                <th>Petani</th>
                                <th>Jumlah (kg)</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15 Jan 2024</td>
                                <td>Budi Santoso</td>
                                <td>100</td>
                                <td>Rp 500.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm p-3">
                    <h5 class="text-center"><i class="bi bi-exclamation-triangle"></i> Hutang Petani</h5>
                    <table class="table table-hover">
                        <thead class="table-danger">
                            <tr>
                                <th>Tanggal</th>
                                <th>Petani</th>
                                <th>Jumlah Hutang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15 Okt 2023</td>
                                <td>Budi Santoso</td>
                                <td>Rp 500.000</td>
                                <td><span class="badge bg-warning text-dark">Belum Lunas</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Bootstrap Icons -->
@endsection

@push('animations')
    <script src="https://cdn.jsdelivr.net/npm/animejs/lib/anime.iife.min.js"></script>
    <script>
        const {
            animate,
            utils,
            createTimer,
            createTimeline,
        } = anime;

        //[Element Card]
        const $card = document.querySelectorAll('.card.shadow-sm.p-3.text-center.border-0');
        const $cardData = document.querySelectorAll('.fs-3.fw-bold span');
        const $petaniChanges = document.querySelector('#petaniChanges')
        // console.log($petaniChanges.innerHTML)

        //[Petani Calculation]
        petaniCalucalation = {{$petani['LastMonth']}} === 0 ? 100 : (Math.round({{$petani['CurrentMonth']}}-{{$petani['LastMonth']}})/{{$petani['LastMonth']}}) * 100
        $petaniChanges.innerHTML = `${petaniCalucalation} %`





        //[Timeline Animation]
        const timeL = createTimeline()
        timeL.add($card, {
            y: [{ to: '-2rem', ease: 'outCubic', duration: 400},
                { to: 0, ease: 'outBack', duration: 400, delay: 50}],
            delay: (_, i) => i * 100, // Function based value
        },0)


        $cardData.forEach(element => {
            const endValues = parseInt(element.textContent.replace(/[^\d]/g, ''), 10);
            element.innerHTML = "0";
            let obj = {
                endValue: 0
            };

            //[Second Animation From Timeline]
            timeL.add(obj,
                {
                endValue: endValues,
                duration: 1000,
                delay: 500,
                ease: 'inSine',
                onUpdate: self => element.innerHTML = Math.round(obj.endValue).toLocaleString('id-ID'),
                onComplete: self => console.log(obj.endValue)
                },0
            );

        });
    </script>
@endpush
@push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
@endpush
