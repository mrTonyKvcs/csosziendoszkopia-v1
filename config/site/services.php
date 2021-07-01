<?php

return [
    [
        'section' => true,
        'route' => null,
        'name' => 'Gasztroszkópia',
        'description' => 'Nyelőcső, gyomor, nyombél endoszkópos vizsgálata, melynek során helyi érzéstelenítés mellett tudjuk vizsgálni a fenti szerveket. Leggyakrabban fekély, refluxbetegség, vérszegénység okának kutatása vagy lisztérzékenység gyanúja, Helicobacter fertőzés gyanúja esetén javasolt.',
        'icon' => 'gastroscopy.svg',
        'prices' => [
            [
                'text'  => null,
                'price' => 40000,
            ]
        ]
    ],
    [
        'section' => true,
        'route' => null,
        'name' => 'Colonoscopia',
        'description' => 'A vastag és végbél endoszkópos vizsgálata, melynek során feltérképezhető a bél gyulladása, jó vagy rosszindulatú daganatos elváltozásai, rákelőző állapotok. A vastagbélrák szűrésére a legalkalmasabb módszer, melynek során lehetőség van biopsziára vagy a kisebb elváltozások eltávolítására.',
        'icon' => 'colonoscopy.svg',
        'prices' => [
            [
                'text'  => null,
                'price' => 50000,
            ]
        ]
    ],
    [
        'section' => false,
        'route' => null,
        'name' => 'Biopszia',
        'description' => '',
        'icon' => 'examination.svg',
        'prices' => [
            [
                'text'  => 'Mintavételi hely',
                'price' => 10000,
            ]
        ]
    ],
    [
        'section' => false,
        'route' => null,
        'name' => 'Polypectomia',
        'description' => '',
        'icon' => 'endoscopic.svg',
        'prices' => [
            [
                'text'  => 'Első alkalom',
                'price' => 15000,
            ],
            [
                'text'  => 'További alkalmak',
                'price' => 10000,
            ]
        ]
    ],
    [
        'section' => true,
        'route' => null,
        'name' => 'Konzultáció',
        'description' => 'Személyes konzultáció: előzetes, az asszisztenssel történt egyeztetés után, bejelentkezés alapján van lehetőség személyes megbeszélésre.',
        'icon' => 'consultation.svg',
        'prices' => [
            [
                'text'  => 'Első alkalom',
                'price' => 18000,
            ]
        ]
    ],
    [
        'section' => false,
        'route' => null,
        'name' => 'Kontroll vizsg.',
        'description' => '',
        'icon' => 'control.svg',
        'prices' => [
            [
                'text'  => null,
                'price' => 10000,
            ]
        ]
    ],
    [
        'section' => false,
        'route' => null,
        'name' => 'Szövettani megbeszélés',
        'description' => '',
        'icon' => 'consultation.svg',
        'prices' => [
            [
                'text'  => null,
                'price' => 5000,
            ]
        ]
    ],
    [
        'section' => false,
        'route' => null,
        'name' => 'Bódítás endoszkópos vizsgálathoz',
        'description' => '',
        'icon' => 'anesthetic.svg',
        'prices' => [
            [
                'text'  => null,
                'price' => 10000,
            ]
        ]
    ],
    [
        'section' => true,
        'route' => 'appointments.index',
        'name' => 'On-line konzultáció',
        'description' => 'On- Line konzultáció: Ön az oldalon keresztül tud időpontot foglalni telefonos vagy inernetes konzultációra ( Skype vagy Zoom). Az időpont foglalása és a kártyás fizetést követően az orvos felveszi Önnel a kapcsolatot és megtörténik a megbeszélés.',
        'icon' => 'online.svg',
        'prices' => [
            [
                'text'  => 'Alkalom',
                'price' => 12000,
            ]
        ]
    ],
];
