<x-layouts.app>
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Orvos</h2>
                        <ul class="bread-list">
                            <li><a href="/">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Orvos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="doctor-details-area section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="doctor-details-item doctor-details-left">
                            <img src="/img/doctors/{{ $doctor['image_path'] }}" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="doctor-details-item">
                            <div class="doctor-details-right">
								<div class="doctor-name">
                                    <h3 class="name">{{ $doctor['name'] }}</h3>
                                    <p class="deg">{{ $doctor['job'] }}</p>
								</div>
                                <div class="doctor-details-biography">
                                    <p>{{ $doctor['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.app>
