<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = '
            <h4>Al-Awn Foundation for Development:</h4>
            <p>
                Al-Awn Foundation for Development is a local non-profit organization working in education, health, empowering 
                third-sector institutions, and emergency humanitarian work.
            </p>
            <h4>Project Description:</h4>
            <p>
                Considering UNHCRs education global strategy, which provides overall 
                guidance for improving refugee access to quality education. In 2022, 
                UNHCR will continue coordinating and collaborating with ministry of 
                education (MoE) and other stakeholders to provide refugee children in 
                Kharaz camp-Lahej and the urban area of Basateen - Aden with quality 
                education in a protected and safe educational environment. Refugee children 
                will have free access to education and the project will target about 2,600 refugee students in 2 primary schools and 500 students in the secondary school in Kharaz refugee camp. These are the numbers of students currently registered in the refugee camp’s schools. In Aden, UNHCR will support three primary schools in Basateen area of Dar Saad district-Aden, where refugee and host community children study, with 5800 students, including 2150 refugee students. UNHCR is also going to support 4 accelerated classes in two primary schools in Basateen with a total number of 160 students. These are 
                the numbers of students currently registered in Basateen primary schools.
            </p>
            <h4>Job information:</h4>
            <p>Job Title: Security Guard </p>
            <p>Work location: Aden </p>
            <p>Contract type: full time</p>
            <p>Contract duration: One year, renewable based on fund and performance</p>
            <p>Date of commencement of work: as soon as possible.</p>
            <h4>Job Purpose:</h4>
            <p>
                The Security Guard is responsible for ensuring premises and staff are kept safe from harm by managing and mitigating any safety or security violations.
            </p>
            <h4>Main responsibilities: </h4>
            <ul>
                <li>Ensuring adherence with Al-Awn Foundation policies, tools, handbooks and guidelines.</li>
                <li>Reporting and clarify any work-related issues and challenges to the security section in a timely manner.</li>
                <li>Detecting signs of intrusion and ensure security of doors, windows, and gates.</li>
                <li>Monitoring and authorizing entrance and departure of employees, visitors, and other persons to guard against theft and maintain security of warehouse.</li>
                <li>Writing reports of daily activities and irregularities, such as equipment or property damage, theft, presence of unauthorized persons, or unusual occurrences in the warehouse or all around.</li>
                <li>Inspecting and adjusting security systems, equipment, and machinery to ensure operational use and to detect evidence of tampering</li>
            </ul>
            <h4>Qualifications and Experience:</h4>
            <ul>
                <li>Completion of post-secondary diploma.</li>
                <li>At least 2 years of experience in a similar position.</li>
            </ul>
        ';

        $job01['name'] = 'Security Guard';
        $job01['description'] = $info;
        $job01['start_date'] = '2022-9-1';
        $job01['end_date'] = '2022-10-1';
        $job01['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job01['company_id'] = 2;
        $job01['city_id'] = 1;
        Job::create($job01);


        $job02['name'] = 'Security Guard';
        $job02['description'] = $info;
        $job02['start_date'] = '2022-09-01';
        $job02['end_date'] = '2032-02-01';
        $job02['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job02['company_id'] = 2;
        $job02['city_id'] = 2;
        Job::create($job02);


        $job03['name'] = 'Web Developer';
        $job03['description'] = $info;
        $job03['start_date'] = '2022-09-01';
        $job03['end_date'] = '2032-02-01';
        $job03['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job03['company_id'] = 3;
        $job03['city_id'] = 3;
        Job::create($job03);


        $job04['name'] = 'Applictions Developer';
        $job04['description'] = $info;
        $job04['start_date'] = '2022-09-01';
        $job04['end_date'] = '2032-02-01';
        $job04['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job04['company_id'] = 3;
        $job04['city_id'] = 1;

        Job::create($job04);


        $job05['name'] = 'Full Stack Developer';
        $job05['description'] = $info;
        $job05['start_date'] = '2022-09-01';
        $job05['end_date'] = '2032-02-01';
        $job05['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job05['company_id'] = 2;
        $job05['city_id'] = 4;
        Job::create($job05);


        $job06['name'] = 'Web Developer';
        $job06['description'] = $info;
        $job06['start_date'] = '2022-09-01';
        $job06['end_date'] = '2032-02-01';
        $job06['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job06['company_id'] = 2;
        $job06['city_id'] = 2;
        Job::create($job06);

        $job07['name'] = 'Security Guard';
        $job07['description'] = $info;
        $job07['start_date'] = '2022-9-1';
        $job07['end_date'] = '2022-10-1';
        $job07['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job07['company_id'] = 2;
        $job07['city_id'] = 1;
        Job::create($job07);


        $job08['name'] = 'Security Guard';
        $job08['description'] = $info;
        $job08['start_date'] = '2022-09-01';
        $job08['end_date'] = '2032-02-01';
        $job08['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job08['company_id'] = 2;
        $job08['city_id'] = 3;
        Job::create($job08);


        $job09['name'] = 'Web Developer';
        $job09['description'] = $info;
        $job09['start_date'] = '2022-09-01';
        $job09['end_date'] = '2032-02-01';
        $job09['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job09['company_id'] = 3;
        $job09['city_id'] = 6;
        Job::create($job09);


        $job10['name'] = 'Applictions Developer';
        $job10['description'] = $info;
        $job10['start_date'] = '2022-09-01';
        $job10['end_date'] = '2032-02-01';
        $job10['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job10['company_id'] = 3;
        $job10['city_id'] = 8;

        Job::create($job10);


        $job11['name'] = 'Full Stack Developer';
        $job11['description'] = $info;
        $job11['start_date'] = '2022-09-01';
        $job11['end_date'] = '2032-02-01';
        $job11['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job11['company_id'] = 2;
        $job11['city_id'] = 1;
        Job::create($job11);


        $job12['name'] = 'Web Developer';
        $job12['description'] = $info;
        $job12['start_date'] = '2022-09-01';
        $job12['end_date'] = '2032-02-01';
        $job12['link'] = 'https://forms.gle/1KFskcB2dNerpU2r7';
        $job12['company_id'] = 2;
        $job12['city_id'] = 1;
        Job::create($job12);
    }
}
