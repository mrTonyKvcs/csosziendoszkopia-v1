<div>
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Online bejelentkezés</h2>
                        <ul class="bread-list">
                            <li><a href="/">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Online bejelentkezés</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form wire:submit.prevent="save">
        <div x-cloak x-data="{ status: @entangle('status') }">
        </div>
        <section x-show="" class="container my-10">
            <div class="">
                <h2 class="text-2xl font-semibold">Időpontfoglalás és fizetés</h2>
                <p class="text-lg">Foglaljon időpontot a vizsgálatainkra!<br> Ön 5000 Ft előleg fizetésével tud időpontot foglalni on-line, mely összeg levonásra kerül a vizsgálat árából</p>
            </div>
            {{-- <section x-show="status === 1" class="container my-10"> --}}
                <div x-data="{ medicalExamination: @entangle('medicalExamination'), doctor: @entangle('doctor'), consultation: @entangle('consultation'), 'appointment': @entangle('appointment') }" class="mt-5 md:mt-0 md:col-span-2">
                    <h2 class="mb-2 text-xl font-semibold">1. Vizsgálat és az orvos kiválasztása</h2>
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-5 bg-white md:px-0 sm:p-6">
                            <div>
                                <select id="medicalExamination" wire:model="medicalExamination" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getActiveMedicalExaminations')">
                                    <option value="" selected>Vizsgálat kiválasztása</option>
                                    @forelse($medicalExaminations as $medical)
                                        <option value="{{ $medical->slug }}">{{ $medical->name }}</option>
                                    @empty
                                        <p>Nem talalhato vizsgalat</p>
                                    @endforelse
                                </select>
                            </div>
                            <div x-cloak x-show="medicalExamination" class="mt-4">
                                <select id="doctor" wire:model="doctor" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getDoctors')">
                                    <option selected>Orvos kiválasztása</option>

                                    @forelse($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @empty
                                        <p>Nem talalhato ehez a vizsgalathoz orvos!</p>
                                    @endforelse
                                </select>
                            </div>
                            <div x-cloak x-show="doctor" class="mt-4">
                                <select id="consultations" wire:model="consultation" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getConsultations')">
                                    <option selected>Rendelési nap kiválasztása</option>

                                    @forelse($consultations as $consultation)
                                        <option value="{{ $consultation->id }}">{{ $consultation->name }}</option>
                                    @empty
                                        <p>Nem talalhato a kivalasztot doktorhoz rendelesinap!</p>
                                    @endforelse
                                </select>
                            </div>
                            <div x-cloak x-show="consultation" class="mt-4">
                                <select id="appointment" wire:model="appointment" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getAppointments')">
                                    <option selected>Időpont kiválasztása</option>

                                    @forelse($appointments as $time)
                                        <option value="{{ $time['start_at'] . ',' . $time['end_at'] }}">{{ $time['start_at'] . '-' . $time['end_at'] }}</option>
                                    @empty
                                        <p>Nem talalhato a kivalasztot rendelesinaphoz idopont!</p>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </section> --}}
        </section>
        <section x-show="" class="container my-10">

            <div class="my-5 md:mt-0 md:col-span-2">
                <h2 class="mb-2 text-xl font-semibold">2. Személyes adatok</h2>
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white md:px-0 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" wire:model="name" id="name" autocomplete="given-name" class="block w-full p-2 mt-1 text-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Név">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" wire:model="email" id="email_address" autocomplete="email" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Email cím">
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="phone" wire:model="phone" id="phone" autocomplete="email" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Telefonszám">
                                @error('phone') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="socialSecurityNumber" wire:model="socialSecurityNumber" id="social_security_number" autocomplete="social_security_number" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Taj-szám">
                                @error('socialSecurityNumber') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="zip" wire:model="zip" id="zip" autocomplete="zip" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Irányítószám">
                                @error('zip') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="city" wire:model="city" id="city" autocomplete="city" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Város">
                                @error('city') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="street" wire:model="street" id="street" autocomplete="street" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Utca és házszám">
                                @error('street') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div x-cloak x-data="{ appointment: @entangle('appointment') }" x-show="appointment != null" class="py-5 text-right">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-lg font-medium text-white bg-blue-600 border border-transparent shadow-sm rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Időpontfoglalás és fizetés
                    </button>
                </div>
        </section>
            </div>
    </form>
</div>
