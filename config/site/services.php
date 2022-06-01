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
                'price' => 50000,
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
                'price' => 60000,
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
                'price' => 12000,
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
                'price' => 17000,
            ],
            [
                'text'  => 'További alkalmak (összesen)',
                'price' => 29000,
            ]
        ]
    ],
    [
        'section' => true,
        'route' => null,
        'name' => 'Konzultáció',
        'description' => 'A konzultáció időtartama körülbelül 15 perc. A tükrözéses vizsgálatok az orvossal történő konzultációt követően, előre megbeszélt  időpontban, megfelelő előkészítés után történnek.',
        'icon' => 'consultation.svg',
        'prices' => [
            [
                'text'  => 'Első alkalom',
                'price' => 22000,
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
                'price' => 15000,
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
                'price' => 6000,
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
                'price' => 12000,
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
