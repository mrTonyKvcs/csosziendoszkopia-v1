<div
    class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="flex items-center text-lg font-medium text-gray-900 uppercase leading-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
            <span class="ml-2">Adatok ellenőrzése és fizetés</span>
        </h3>
    </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Név</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->name }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Email cím</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->email }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Telefonszám</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->phone }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Taj-szám</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->socialSecurityNumber }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Irányítószám</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->zip }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Város</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->city }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-lg font-medium text-gray-500">Utca</dt>
                <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->street }}</dd>
            </div>
        </dl>
    </div>
</div>
