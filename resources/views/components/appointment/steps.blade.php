<div class="mb-5 overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-3 sm:px-6">
        <nav aria-label="Progress">
            <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
                <li class="md:flex-1">
                    <!-- Completed Step -->
                    <div
                        :class="phase >= 1 ? 'border-blue-600 hover:border-blue-800' : ''"
                        class="flex flex-col py-2 pl-4 border-l-4 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4 group"
                    >
                        <span
                            :class="phase >= 1 ? 'text-blue-600 group-hover:text-blue-800' : ''"
                            class="font-semibold tracking-wide uppercase text-md"
                        >
                            1. lépés
                        </span>
                        <span class="font-medium text-md">Vizsgálat és az Orvos kiválasztása</span>
                    </div>
                </li>

                <li class="md:flex-1">
                    <!-- Completed Step -->
                    <div
                        :class="phase >= 2 ? 'border-blue-600 hover:border-blue-800' : ''"
                        class="flex flex-col py-2 pl-4 border-l-4 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4 group"
                    >
                        <span
                            :class="phase >= 2 ? 'text-blue-600 group-hover:text-blue-800' : ''"
                            class="font-semibold tracking-wide uppercase text-md"
                        >
                            2. lépés
                        </span>
                        <span class="font-medium text-md">Személyes adatok megadása</span>
                    </div>
                </li>

                <li class="md:flex-1">
                    <!-- Completed Step -->
                    <div
                        :class="phase == 3 ? 'border-blue-600 hover:border-blue-800' : ''"
                        class="flex flex-col py-2 pl-4 border-l-4 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4 group"
                    >
                        <span
                            :class="phase == 3 ? 'text-blue-600 group-hover:text-blue-800' : ''"
                            class="font-semibold tracking-wide uppercase text-md"
                        >
                            3. lépés
                        </span>
                        <span class="font-medium text-md">Adatok ellenőrzése és fizetés</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>
