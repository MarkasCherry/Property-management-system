<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    private $settings = [
        [
            'id' => Setting::PRIVACY_POLICY,
            'name' => 'Privacy Policy',
            'value' => '<p>We recognize the importance of our guests’ personal information (names, emails, address, phone numbers, ages, etc),<br>and we comply with the relevant laws and guidelines in order to ensure its protection.<br>The following is the basic privacy policy that we follow in regards to the handling of personal information:</p><h2>1. Collection and Management of Personal Information</h2><p>The personal information of our guests is stored on our company’s computers<br>and only accessed within the scope of our business activities.<br>With the exception of public information, your information is only collected<br>in a manner accordant to fair and practice and the law.<br>We will never share your information with third parties without your express consent.</p><h2>2. Purposes for the Use of Personal Information</h2><p>When you use our services or visit our website, information from your browser such as your IP address<br>and the pages you view are recorded in our server logs (history).<br>Our reasons for collecting your information are limited to the following three purposes:</p><ul><li>To make bookings, provide various services, and ensure the safety of our guests;</li><li>To confirm reservations and arrangements;</li><li>To respond to inquiries and requests;</li></ul><h2>3. Information Sharing and Disclosure</h2><p>We do not sell or rent personally identifiable information about users to third parties.<br>We may provide personally identifiable information about users to third parties in the following cases:</p><ul><li>When a User gives us express consent share their information;</li><li>When necessary to provide a service requested by a User;</li><li>When necessary for a Hotel representative to provide a service requested by a User<br>(a Hotel representative may not use a User’s information for purposes other than those specified,<br>unless the Hotel has received permission from the User)</li><li>When responding to a legal order or fulfilling a legal process;</li><li>When a User violates the Terms of Use while accessing our information or services provided by the Hotel.</li></ul><h2>4. Handling of Personal Information and Protection Measures</h2><p>In order to strictly protect personal information, we make sure that company employees<br>are educated and equipped to implement safety measures in the storage and management of personal information.</p><ul><li>The person in charge of managing personal information is appointed by the Hotel<br>and ensure that personal information is handled properly.</li><li>In the event that work is outsourced to a third party, the Hotel will select a contractor capable of<br>adequately protecting personal information, and the contract will give thorough direction on the management of personal information.</li></ul><h2>5. Changes to this Privacy Policy</h2><p>From time to time, we may update or modify the way we handle personal information.<br>We will announce on our website when there any changes to the handling of Users’ information.</p><h2>For inquiries regarding the protection of personal information, please contact:</h2><p>Toshiharu Ryokan<br>326 Benzaitencho<br>Suwamachi-Matsubara-sagaru<br>Shimogyo-ku, Kyoto 600-8428<br>TEL.<span>&nbsp;</span><a href="tel:+81-75-341-5301">+81 75-341-5301</a><span>&nbsp;</span>/ FAX. 075-341-5303</p>'
        ],
        [
            'id' => 2,
            'name' => 'Phone',
            'value' => '+44863512210'
        ],
        [
            'id' => 3,
            'name' => 'Email',
            'value' => 'admin@propertiesmanager.co.uk'
        ],
        [
            'id' => 4,
            'name' => 'Address',
            'value' => '326 Benzaitencho, Suwamachi-Matsubara-sagaru, Shimogyo-ku, Kyoto 600-8428'
        ],
        [
            'id' => 5,
            'name' => 'Deposit Pricing',
            'value' => 20
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $setting) {
            Setting::updateOrCreate([
                'id' => $setting['id']
            ], $setting);
        }
    }
}
