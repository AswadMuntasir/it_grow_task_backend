<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Country;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all country IDs
        $japanId = Country::where('code', 'ja')->value('id');
        $auId = Country::where('code', 'au')->value('id');

        $eventData = [
            [
                'timestamp' => Carbon::createFromTimestamp(1691365800),
                'actual' => null,
                'forecast' => null,
                'previous' => null,
                'importance' => 'low',
                'country_id' => $japanId,
                'title' => "BoJ Summary of Opinions",
                'body' => "This report includes the BOJ's projection for inflation and economic growth. It is scheduled 8 times per year, about 10 days after the Monetary Policy Statement is released.",
                'description' => "This report includes the BOJ's projection for inflation and economic growth. It is scheduled 8 times per year, about 10 days after the Monetary Policy Statement is released",
            ],
            [
                'timestamp' => Carbon::createFromTimestamp(1691365800),
                'actual' => '1,253.7B',
                'forecast' => null,
                'previous' => '1,247.2B',
                'importance' => 'low',
                'country_id' => $japanId,
                'title' => "Foreign Reserves (USD)",
                'body' => "<p>Official reserve assets comprises foreign currency reserves, IMF reserve position, SDRs and gold. A higher than expected number should be taken as positive to the JPY, while a lower than expected number as negative.</p>",
                'description' => "Official reserve assets comprises foreign currency reserves, IMF reserve position, SDRs and gold. A higher than expected number should be taken as positive to the JPY, while a lower than",
            ],
            [
                'timestamp' => Carbon::createFromTimestamp(1691371800),
                'actual' => '0.4%',
                'forecast' => '0.1%',
                'previous' => '-2.7%',
                'importance' => 'low',
                'country_id' => $auId,
                'title' => "ANZ Job Advertisements",
                'body' => "<p>The Australia and New Zealand Banking Group (ANZ) Job Advertisements report measures the change in the number of jobs advertised in the major daily newspapers and websites covering the capital cities. This report tends to have a greater impact when it is released ahead of government employment data.</p><p>A higher than expected reading should be taken as positive/bullish for the AUD, while a lower than expected reading should be taken as negative/bearish for the AUD.</p>",
                'description' => "The Australia and New Zealand Banking Group (ANZ) Job Advertisements report measures the change in the number of jobs advertised in the major daily newspapers and websites covering the capital",
            ],
            
        ];

        // Insert the event data into the 'events' table
        foreach ($eventData as $data) {
            Event::create($data);
        }
    }
}
