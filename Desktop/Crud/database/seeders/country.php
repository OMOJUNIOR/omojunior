<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class country extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'id' => 1,
                'name' => 'Afghanistan',
                'code' => 'af',
            ],
            [
                'id' => 2,
                'name' => 'Albania',
                'code' => 'al',
            ],
            [
                'id' => 3,
                'name' => 'Algeria',
                'code' => 'dz',
            ],
            [
                'id' => 4,
                'name' => 'American Samoa',
                'code' => 'as',
            ],
            [
                'id' => 5,
                'name' => 'Andorra',
                'code' => 'ad',
            ],
            [
                'id' => 6,
                'name' => 'Angola',
                'code' => 'ao',
            ],
            [
                'id' => 7,
                'name' => 'Anguilla',
                'code' => 'ai',
            ],
            [
                'id' => 8,
                'name' => 'Antarctica',
                'code' => 'aq',
            ],
            [
                'id' => 9,
                'name' => 'Antigua and Barbuda',
                'code' => 'ag',
            ],
            [
                'id' => 10,
                'name' => 'Argentina',
                'code' => 'ar',
            ],
            [
                'id' => 11,
                'name' => 'Armenia',
                'code' => 'am',
            ],
            [
                'id' => 12,
                'name' => 'Aruba',
                'code' => 'aw',
            ],
            [
                'id' => 13,
                'name' => 'Australia',
                'code' => 'au',
            ],
            [
                'id' => 14,
                'name' => 'Austria',
                'code' => 'at',
            ],
            [
                'id' => 15,
                'name' => 'Azerbaijan',
                'code' => 'az',
            ],
            [
                'id' => 16,
                'name' => 'Bahamas',
                'code' => 'bs',
            ],
            [
                'id' => 17,
                'name' => 'Bahrain',
                'code' => 'bh',
            ],
            [
                'id' => 18,
                'name' => 'Bangladesh',
                'code' => 'bd',
            ],
            [
                'id' => 19,
                'name' => 'Barbados',
                'code' => 'bb',
            ],
            [
                'id' => 20,
                'name' => 'Belarus',
                'code' => 'by',
            ],
            [
                'id' => 21,
                'name' => 'Belgium',
                'code' => 'be',
            ],
            [
                'id' => 22,
                'name' => 'Belize',
                'code' => 'bz',
            ],
            [
                'id' => 23,
                'name' => 'Benin',
                'code' => 'bj',
            ],
            [
                'id' => 24,
                'name' => 'Bermuda',
                'code' => 'bm',
            ],
            [
                'id' => 25,
                'name' => 'Bhutan',
                'code' => 'bt',
            ],
            [
                'id' => 26,
                'name' => 'Bolivia',
                'code' => 'bo',
            ],
            [
                'id' => 27,
                'name' => 'Bosnia and Herzegovina',
                'code' => 'ba',
            ],
            [
                'id' => 28,
                'name' => 'Botswana',
                'code' => 'bw',
            ],
            [
                'id' => 29,
                'name' => 'Brazil',
                'code' => 'br',
            ],
            [
                'id' => 30,
                'name' => 'British Indian Ocean Territory',
                'code' => 'io',
            ],
            [
                'id' => 31,
                'name' => 'British Virgin Islands',
                'code' => 'vg',
            ],
            [
                'id' => 32,
                'name' => 'Brunei',
                'code' => 'bn',
            ],
            [
                'id' => 33,
                'name' => 'Bulgaria',
                'code' => 'bg',
            ],
            [
                'id' => 34,
                'name' => 'Burkina Faso',
                'code' => 'bf',
            ],
            [
                'id' => 35,
                'name' => 'Burundi',
                'code' => 'bi',
            ],
            [
                'id' => 36,
                'name' => 'Cambodia',
                'code' => 'kh',
            ],
            [
                'id' => 37,
                'name' => 'Cameroon',
                'code' => 'cm',
            ],
            [
                'id' => 38,
                'name' => 'Canada',
                'code' => 'ca',
            ],
            [
                'id' => 39,
                'name' => 'Cape Verde',
                'code' => 'cv',
            ],
            [
                'id' => 40,
                'name' => 'Cayman Islands',
                'code' => 'ky',
            ],
            [
                'id' => 41,
                'name' => 'Central African Republic',
                'code' => 'cf',
            ],
            [
                'id' => 42,
                'name' => 'Chad',
                'code' => 'td',
            ],
            [
                'id' => 43,
                'name' => 'Chile',
                'code' => 'cl',
            ],
            [
                'id' => 44,
                'name' => 'China',
                'code' => 'cn',
            ],
            [
                'id' => 45,
                'name' => 'Christmas Island',
                'code' => 'cx',
            ],
            [
                'id' => 46,
                'name' => 'Cocos Islands',
                'code' => 'cc',
            ],
            [
                'id' => 47,
                'name' => 'Colombia',
                'code' => 'co',
            ],
            [
                'id' => 48,
                'name' => 'Comoros',
                'code' => 'km',
            ],
            [
                'id' => 49,
                'name' => 'Cook Islands',
                'code' => 'ck',
            ],
            [
                'id' => 50,
                'name' => 'Costa Rica',
                'code' => 'cr',
            ],
            [
                'id' => 51,
                'name' => 'Croatia',
                'code' => 'hr',
            ],
            [
                'id' => 52,
                'name' => 'Cuba',
                'code' => 'cu',
            ],
            [
                'id' => 53,
                'name' => 'Curacao',
                'code' => 'cw',
            ],
            [
                'id' => 54,
                'name' => 'Cyprus',
                'code' => 'cy',
            ],
            [
                'id' => 55,
                'name' => 'Czech Republic',
                'code' => 'cz',
            ],
            [
                'id' => 56,
                'name' => 'Democratic Republic of the Congo',
                'code' => 'cd',
            ],
            [
                'id' => 57,
                'name' => 'Denmark',
                'code' => 'dk',
            ],
            [
                'id' => 58,
                'name' => 'Djibouti',
                'code' => 'dj',
            ],
            [
                'id' => 59,
                'name' => 'Dominica',
                'code' => 'dm',
            ],
            [
                'id' => 60,
                'name' => 'Dominican Republic',
                'code' => 'do',
            ],
            [
                'id' => 61,
                'name' => 'East Timor',
                'code' => 'tl',
            ],
            [
                'id' => 62,
                'name' => 'Ecuador',
                'code' => 'ec',
            ],
            [
                'id' => 63,
                'name' => 'Egypt',
                'code' => 'eg',
            ],
            [
                'id' => 64,
                'name' => 'El Salvador',
                'code' => 'sv',
            ],
            [
                'id' => 65,
                'name' => 'Equatorial Guinea',
                'code' => 'gq',
            ],
            [
                'id' => 66,
                'name' => 'Eritrea',
                'code' => 'er',
            ],
            [
                'id' => 67,
                'name' => 'Estonia',
                'code' => 'ee',
            ],
            [
                'id' => 68,
                'name' => 'Ethiopia',
                'code' => 'et',
            ],
            [
                'id' => 69,
                'name' => 'Falkland Islands',
                'code' => 'fk',
            ],
            [
                'id' => 70,
                'name' => 'Faroe Islands',
                'code' => 'fo',
            ],
            [
                'id' => 71,
                'name' => 'Fiji',
                'code' => 'fj',
            ],
            [
                'id' => 72,
                'name' => 'Finland',
                'code' => 'fi',
            ],
            [
                'id' => 73,
                'name' => 'France',
                'code' => 'fr',
            ],
            [
                'id' => 74,
                'name' => 'French Polynesia',
                'code' => 'pf',
            ],
            [
                'id' => 75,
                'name' => 'Gabon',
                'code' => 'ga',
            ],
            [
                'id' => 76,
                'name' => 'Gambia',
                'code' => 'gm',
            ],
            [
                'id' => 77,
                'name' => 'Georgia',
                'code' => 'ge',
            ],
            [
                'id' => 78,
                'name' => 'Germany',
                'code' => 'de',
            ],
            [
                'id' => 79,
                'name' => 'Ghana',
                'code' => 'gh',
            ],
            [
                'id' => 80,
                'name' => 'Gibraltar',
                'code' => 'gi',
            ],
            [
                'id' => 81,
                'name' => 'Greece',
                'code' => 'gr',
            ],
            [
                'id' => 82,
                'name' => 'Greenland',
                'code' => 'gl',
            ],
            [
                'id' => 83,
                'name' => 'Grenada',
                'code' => 'gd',
            ],
            [
                'id' => 84,
                'name' => 'Guam',
                'code' => 'gu',
            ],
            [
                'id' => 85,
                'name' => 'Guatemala',
                'code' => 'gt',
            ],
            [
                'id' => 86,
                'name' => 'Guernsey',
                'code' => 'gg',
            ],
            [
                'id' => 87,
                'name' => 'Guinea',
                'code' => 'gn',
            ],
            [
                'id' => 88,
                'name' => 'Guinea-Bissau',
                'code' => 'gw',
            ],
            [
                'id' => 89,
                'name' => 'Guyana',
                'code' => 'gy',
            ],
            [
                'id' => 90,
                'name' => 'Haiti',
                'code' => 'ht',
            ],
            [
                'id' => 91,
                'name' => 'Honduras',
                'code' => 'hn',
            ],
            [
                'id' => 92,
                'name' => 'Hong Kong',
                'code' => 'hk',
            ],
            [
                'id' => 93,
                'name' => 'Hungary',
                'code' => 'hu',
            ],
            [
                'id' => 94,
                'name' => 'Iceland',
                'code' => 'is',
            ],
            [
                'id' => 95,
                'name' => 'India',
                'code' => 'in',
            ],
            [
                'id' => 96,
                'name' => 'Indonesia',
                'code' => 'id',
            ],
            [
                'id' => 97,
                'name' => 'Iran',
                'code' => 'ir',
            ],
            [
                'id' => 98,
                'name' => 'Iraq',
                'code' => 'iq',
            ],
            [
                'id' => 99,
                'name' => 'Ireland',
                'code' => 'ie',
            ],
            [
                'id' => 100,
                'name' => 'Isle of Man',
                'code' => 'im',
            ],
            [
                'id' => 101,
                'name' => 'Israel',
                'code' => 'il',
            ],
            [
                'id' => 102,
                'name' => 'Italy',
                'code' => 'it',
            ],
            [
                'id' => 103,
                'name' => 'Ivory Coast',
                'code' => 'ci',
            ],
            [
                'id' => 104,
                'name' => 'Jamaica',
                'code' => 'jm',
            ],
            [
                'id' => 105,
                'name' => 'Japan',
                'code' => 'jp',
            ],
            [
                'id' => 106,
                'name' => 'Jersey',
                'code' => 'je',
            ],
            [
                'id' => 107,
                'name' => 'Jordan',
                'code' => 'jo',
            ],
            [
                'id' => 108,
                'name' => 'Kazakhstan',
                'code' => 'kz',
            ],
            [
                'id' => 109,
                'name' => 'Kenya',
                'code' => 'ke',
            ],
            [
                'id' => 110,
                'name' => 'Kiribati',
                'code' => 'ki',
            ],
            [
                'id' => 111,
                'name' => 'Kosovo',
                'code' => 'xk',
            ],
            [
                'id' => 112,
                'name' => 'Kuwait',
                'code' => 'kw',
            ],
            [
                'id' => 113,
                'name' => 'Kyrgyzstan',
                'code' => 'kg',
            ],
            [
                'id' => 114,
                'name' => 'Laos',
                'code' => 'la',
            ],
            [
                'id' => 115,
                'name' => 'Latvia',
                'code' => 'lv',
            ],
            [
                'id' => 116,
                'name' => 'Lebanon',
                'code' => 'lb',
            ],
            [
                'id' => 117,
                'name' => 'Lesotho',
                'code' => 'ls',
            ],
            [
                'id' => 118,
                'name' => 'Liberia',
                'code' => 'lr',
            ],
            [
                'id' => 119,
                'name' => 'Libya',
                'code' => 'ly',
            ],
            [
                'id' => 120,
                'name' => 'Liechtenstein',
                'code' => 'li',
            ],
            [
                'id' => 121,
                'name' => 'Lithuania',
                'code' => 'lt',
            ],
            [
                'id' => 122,
                'name' => 'Luxembourg',
                'code' => 'lu',
            ],
            [
                'id' => 123,
                'name' => 'Macau',
                'code' => 'mo',
            ],
            [
                'id' => 124,
                'name' => 'North Macedonia',
                'code' => 'mk',
            ],
            [
                'id' => 125,
                'name' => 'Madagascar',
                'code' => 'mg',
            ],
            [
                'id' => 126,
                'name' => 'Malawi',
                'code' => 'mw',
            ],
            [
                'id' => 127,
                'name' => 'Malaysia',
                'code' => 'my',
            ],
            [
                'id' => 128,
                'name' => 'Maldives',
                'code' => 'mv',
            ],
            [
                'id' => 129,
                'name' => 'Mali',
                'code' => 'ml',
            ],
            [
                'id' => 130,
                'name' => 'Malta',
                'code' => 'mt',
            ],
            [
                'id' => 131,
                'name' => 'Marshall Islands',
                'code' => 'mh',
            ],
            [
                'id' => 132,
                'name' => 'Mauritania',
                'code' => 'mr',
            ],
            [
                'id' => 133,
                'name' => 'Mauritius',
                'code' => 'mu',
            ],
            [
                'id' => 134,
                'name' => 'Mayotte',
                'code' => 'yt',
            ],
            [
                'id' => 135,
                'name' => 'Mexico',
                'code' => 'mx',
            ],
            [
                'id' => 136,
                'name' => 'Micronesia',
                'code' => 'fm',
            ],
            [
                'id' => 137,
                'name' => 'Moldova',
                'code' => 'md',
            ],
            [
                'id' => 138,
                'name' => 'Monaco',
                'code' => 'mc',
            ],
            [
                'id' => 139,
                'name' => 'Mongolia',
                'code' => 'mn',
            ],
            [
                'id' => 140,
                'name' => 'Montenegro',
                'code' => 'me',
            ],
            [
                'id' => 141,
                'name' => 'Montserrat',
                'code' => 'ms',
            ],
            [
                'id' => 142,
                'name' => 'Morocco',
                'code' => 'ma',
            ],
            [
                'id' => 143,
                'name' => 'Mozambique',
                'code' => 'mz',
            ],
            [
                'id' => 144,
                'name' => 'Myanmar',
                'code' => 'mm',
            ],
            [
                'id' => 145,
                'name' => 'Namibia',
                'code' => 'na',
            ],
            [
                'id' => 146,
                'name' => 'Nauru',
                'code' => 'nr',
            ],
            [
                'id' => 147,
                'name' => 'Nepal',
                'code' => 'np',
            ],
            [
                'id' => 148,
                'name' => 'Netherlands',
                'code' => 'nl',
            ],
            [
                'id' => 149,
                'name' => 'Netherlands Antilles',
                'code' => 'an',
            ],
            [
                'id' => 150,
                'name' => 'New Caledonia',
                'code' => 'nc',
            ],
            [
                'id' => 151,
                'name' => 'New Zealand',
                'code' => 'nz',
            ],
            [
                'id' => 152,
                'name' => 'Nicaragua',
                'code' => 'ni',
            ],
            [
                'id' => 153,
                'name' => 'Niger',
                'code' => 'ne',
            ],
            [
                'id' => 154,
                'name' => 'Nigeria',
                'code' => 'ng',
            ],
            [
                'id' => 155,
                'name' => 'Niue',
                'code' => 'nu',
            ],
            [
                'id' => 156,
                'name' => 'North Korea',
                'code' => 'kp',
            ],
            [
                'id' => 157,
                'name' => 'Northern Mariana Islands',
                'code' => 'mp',
            ],
            [
                'id' => 158,
                'name' => 'Norway',
                'code' => 'no',
            ],
            [
                'id' => 159,
                'name' => 'Oman',
                'code' => 'om',
            ],
            [
                'id' => 160,
                'name' => 'Pakistan',
                'code' => 'pk',
            ],
            [
                'id' => 161,
                'name' => 'Palau',
                'code' => 'pw',
            ],
            [
                'id' => 162,
                'name' => 'Palestine',
                'code' => 'ps',
            ],
            [
                'id' => 163,
                'name' => 'Panama',
                'code' => 'pa',
            ],
            [
                'id' => 164,
                'name' => 'Papua New Guinea',
                'code' => 'pg',
            ],
            [
                'id' => 165,
                'name' => 'Paraguay',
                'code' => 'py',
            ],
            [
                'id' => 166,
                'name' => 'Peru',
                'code' => 'pe',
            ],
            [
                'id' => 167,
                'name' => 'Philippines',
                'code' => 'ph',
            ],
            [
                'id' => 168,
                'name' => 'Pitcairn',
                'code' => 'pn',
            ],
            [
                'id' => 169,
                'name' => 'Poland',
                'code' => 'pl',
            ],
            [
                'id' => 170,
                'name' => 'Portugal',
                'code' => 'pt',
            ],
            [
                'id' => 171,
                'name' => 'Puerto Rico',
                'code' => 'pr',
            ],
            [
                'id' => 172,
                'name' => 'Qatar',
                'code' => 'qa',
            ],
            [
                'id' => 173,
                'name' => 'Republic of the Congo',
                'code' => 'cg',
            ],
            [
                'id' => 174,
                'name' => 'Reunion',
                'code' => 're',
            ],
            [
                'id' => 175,
                'name' => 'Romania',
                'code' => 'ro',
            ],
            [
                'id' => 176,
                'name' => 'Russia',
                'code' => 'ru',
            ],
            [
                'id' => 177,
                'name' => 'Rwanda',
                'code' => 'rw',
            ],
            [
                'id' => 178,
                'name' => 'Saint Barthelemy',
                'code' => 'bl',
            ],
            [
                'id' => 179,
                'name' => 'Saint Helena',
                'code' => 'sh',
            ],
            [
                'id' => 180,
                'name' => 'Saint Kitts and Nevis',
                'code' => 'kn',
            ],
            [
                'id' => 181,
                'name' => 'Saint Lucia',
                'code' => 'lc',
            ],
            [
                'id' => 182,
                'name' => 'Saint Martin',
                'code' => 'mf',
            ],
            [
                'id' => 183,
                'name' => 'Saint Pierre and Miquelon',
                'code' => 'pm',
            ],
            [
                'id' => 184,
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'vc',
            ],
            [
                'id' => 185,
                'name' => 'Samoa',
                'code' => 'ws',
            ],
            [
                'id' => 186,
                'name' => 'San Marino',
                'code' => 'sm',
            ],
            [
                'id' => 187,
                'name' => 'Sao Tome and Principe',
                'code' => 'st',
            ],
            [
                'id' => 188,
                'name' => 'Saudi Arabia',
                'code' => 'sa',
            ],
            [
                'id' => 189,
                'name' => 'Senegal',
                'code' => 'sn',
            ],
            [
                'id' => 190,
                'name' => 'Serbia',
                'code' => 'rs',
            ],
            [
                'id' => 191,
                'name' => 'Seychelles',
                'code' => 'sc',
            ],
            [
                'id' => 192,
                'name' => 'Sierra Leone',
                'code' => 'sl',
            ],
            [
                'id' => 193,
                'name' => 'Singapore',
                'code' => 'sg',
            ],
            [
                'id' => 194,
                'name' => 'Sint Maarten',
                'code' => 'sx',
            ],
            [
                'id' => 195,
                'name' => 'Slovakia',
                'code' => 'sk',
            ],
            [
                'id' => 196,
                'name' => 'Slovenia',
                'code' => 'si',
            ],
            [
                'id' => 197,
                'name' => 'Solomon Islands',
                'code' => 'sb',
            ],
            [
                'id' => 198,
                'name' => 'Somalia',
                'code' => 'so',
            ],
            [
                'id' => 199,
                'name' => 'South Africa',
                'code' => 'za',
            ],
            [
                'id' => 200,
                'name' => 'South Korea',
                'code' => 'kr',
            ],
            [
                'id' => 201,
                'name' => 'South Sudan',
                'code' => 'ss',
            ],
            [
                'id' => 202,
                'name' => 'Spain',
                'code' => 'es',
            ],
            [
                'id' => 203,
                'name' => 'Sri Lanka',
                'code' => 'lk',
            ],
            [
                'id' => 204,
                'name' => 'Sudan',
                'code' => 'sd',
            ],
            [
                'id' => 205,
                'name' => 'Suriname',
                'code' => 'sr',
            ],
            [
                'id' => 206,
                'name' => 'Svalbard and Jan Mayen',
                'code' => 'sj',
            ],
            [
                'id' => 207,
                'name' => 'Swaziland',
                'code' => 'sz',
            ],
            [
                'id' => 208,
                'name' => 'Sweden',
                'code' => 'se',
            ],
            [
                'id' => 209,
                'name' => 'Switzerland',
                'code' => 'ch',
            ],
            [
                'id' => 210,
                'name' => 'Syria',
                'code' => 'sy',
            ],
            [
                'id' => 211,
                'name' => 'Taiwan',
                'code' => 'tw',
            ],
            [
                'id' => 212,
                'name' => 'Tajikistan',
                'code' => 'tj',
            ],
            [
                'id' => 213,
                'name' => 'Tanzania',
                'code' => 'tz',
            ],
            [
                'id' => 214,
                'name' => 'Thailand',
                'code' => 'th',
            ],
            [
                'id' => 215,
                'name' => 'Togo',
                'code' => 'tg',
            ],
            [
                'id' => 216,
                'name' => 'Tokelau',
                'code' => 'tk',
            ],
            [
                'id' => 217,
                'name' => 'Tonga',
                'code' => 'to',
            ],
            [
                'id' => 218,
                'name' => 'Trinidad and Tobago',
                'code' => 'tt',
            ],
            [
                'id' => 219,
                'name' => 'Tunisia',
                'code' => 'tn',
            ],
            [
                'id' => 220,
                'name' => 'Turkey',
                'code' => 'tr',
            ],
            [
                'id' => 221,
                'name' => 'Turkmenistan',
                'code' => 'tm',
            ],
            [
                'id' => 222,
                'name' => 'Turks and Caicos Islands',
                'code' => 'tc',
            ],
            [
                'id' => 223,
                'name' => 'Tuvalu',
                'code' => 'tv',
            ],
            [
                'id' => 224,
                'name' => 'U.S. Virgin Islands',
                'code' => 'vi',
            ],
            [
                'id' => 225,
                'name' => 'Uganda',
                'code' => 'ug',
            ],
            [
                'id' => 226,
                'name' => 'Ukraine',
                'code' => 'ua',
            ],
            [
                'id' => 227,
                'name' => 'United Arab Emirates',
                'code' => 'ae',
            ],
            [
                'id' => 228,
                'name' => 'United Kingdom',
                'code' => 'gb',
            ],
            [
                'id' => 229,
                'name' => 'United States',
                'code' => 'us',
            ],
            [
                'id' => 230,
                'name' => 'Uruguay',
                'code' => 'uy',
            ],
            [
                'id' => 231,
                'name' => 'Uzbekistan',
                'code' => 'uz',
            ],
            [
                'id' => 232,
                'name' => 'Vanuatu',
                'code' => 'vu',
            ],
            [
                'id' => 233,
                'name' => 'Vatican',
                'code' => 'va',
            ],
            [
                'id' => 234,
                'name' => 'Venezuela',
                'code' => 've',
            ],
            [
                'id' => 235,
                'name' => 'Vietnam',
                'code' => 'vn',
            ],
            [
                'id' => 236,
                'name' => 'Wallis and Futuna',
                'code' => 'wf',
            ],
            [
                'id' => 237,
                'name' => 'Western Sahara',
                'code' => 'eh',
            ],
            [
                'id' => 238,
                'name' => 'Yemen',
                'code' => 'ye',
            ],
            [
                'id' => 239,
                'name' => 'Zambia',
                'code' => 'zm',
            ],
            [
                'id' => 240,
                'name' => 'Zimbabwe',
                'code' => 'zw',
            ],
        ];

        DB::table('countries')->insert($countries);
    }
}
