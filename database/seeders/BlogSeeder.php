<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the admin user
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            $this->command->error('No admin user found. Please run AdminUserSeeder first.');
            return;
        }

        // Create categories
        $categories = [
            ['name' => 'Technology Trends', 'description' => 'Latest trends in technology and innovation'],
            ['name' => 'Mobile Repair', 'description' => 'Tips and guides for mobile device repairs'],
            ['name' => 'Laptop Services', 'description' => 'Everything about laptop maintenance and repair'],
            ['name' => 'Gadget Reviews', 'description' => 'Honest reviews of the latest gadgets'],
            ['name' => 'Customer Stories', 'description' => 'Real stories from our satisfied customers'],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create tags
        $tags = [
            ['name' => 'Smartphone'],
            ['name' => 'Laptop'],
            ['name' => 'Repair'],
            ['name' => 'Technology'],
            ['name' => 'Gadgets'],
            ['name' => 'Mobile'],
            ['name' => 'iPhone'],
            ['name' => 'Android'],
            ['name' => 'Windows'],
            ['name' => 'MacBook'],
        ];

        foreach ($tags as $tagData) {
            Tag::create($tagData);
        }

        // Create sample blog posts
        $blogs = [
            [
                'title' => 'The Future of Smartphone Technology in 2025',
                'excerpt' => 'Explore the cutting-edge innovations that will shape mobile technology this year.',
                'content' => '<p>As we step into 2025, the smartphone landscape is evolving at an unprecedented pace. From foldable displays to advanced AI integration, here\'s what you can expect.</p>

<h2>Foldable Technology Takes Center Stage</h2>
<p>Foldable smartphones are no longer a novelty. With improved durability and refined designs, they\'re becoming mainstream. The key improvements include:</p>
<ul>
<li>Better hinge mechanisms</li>
<li>Enhanced glass protection</li>
<li>Seamless multitasking experiences</li>
</ul>

<h2>AI Integration Deepens</h2>
<p>Artificial intelligence is becoming more sophisticated in mobile devices, offering personalized experiences and intelligent assistance.</p>

<p>At Multicop Tech, we stay ahead of these trends to provide you with the best repair and upgrade services for your devices.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'categories' => ['Technology Trends'],
                'tags' => ['Smartphone', 'Technology', 'Mobile', 'AI'],
            ],
            [
                'title' => 'Common iPhone Screen Repair Myths Debunked',
                'excerpt' => 'Separating fact from fiction when it comes to iPhone screen repairs.',
                'content' => '<p>iPhone screen repairs are one of our most requested services. However, there are many misconceptions about this process. Let\'s set the record straight.</p>

<h2>Myth 1: OEM Parts Are Always Better</h2>
<p>While original equipment manufacturer parts are ideal, high-quality aftermarket parts can be just as reliable when installed by certified technicians.</p>

<h2>Myth 2: Repairing Your Phone Will Void Warranty</h2>
<p>This is only partially true. Apple\'s warranty is voided, but many extended warranties and insurance plans still cover repairs performed by authorized service providers.</p>

<h2>Myth 3: DIY Repairs Save Money</h2>
<p>While DIY might seem cost-effective initially, improper repairs often lead to more expensive problems down the line. Professional repairs ensure your device works perfectly.</p>

<p>Trust Multicop Tech for all your iPhone repair needs. Our certified technicians use genuine parts and provide warranty on all repairs.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'categories' => ['Mobile Repair'],
                'tags' => ['iPhone', 'Repair', 'Mobile', 'Screen'],
            ],
            [
                'title' => 'Why Choose Multicop Tech for Your Laptop Repairs',
                'excerpt' => 'Discover what sets us apart in laptop repair services.',
                'content' => '<p>When your laptop breaks down, you need a reliable repair service you can trust. Here\'s why thousands of customers choose Multicop Tech.</p>

<h2>Certified Technicians</h2>
<p>Our team consists of certified professionals with years of experience in laptop repair and maintenance.</p>

<h2>Genuine Parts Guarantee</h2>
<p>We use only authentic, high-quality parts to ensure your laptop performs like new.</p>

<h2>Fast Turnaround Time</h2>
<p>Most repairs are completed within 24-48 hours, minimizing your downtime.</p>

<h2>Comprehensive Warranty</h2>
<p>All our repairs come with a comprehensive warranty for your peace of mind.</p>

<h2>Competitive Pricing</h2>
<p>Quality service doesn\'t have to be expensive. We offer competitive pricing without compromising on quality.</p>

<p>Experience the Multicop Tech difference today. Your satisfaction is our priority.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(7),
                'categories' => ['Laptop Services'],
                'tags' => ['Laptop', 'Repair', 'Windows', 'MacBook'],
            ],
            [
                'title' => 'Top 5 Gadgets to Watch in 2025',
                'excerpt' => 'Our picks for the most exciting tech gadgets coming this year.',
                'content' => '<p>The tech world is buzzing with excitement for 2025. Here are our top picks for gadgets that will define the year.</p>

<h2>1. Quantum Smartwatches</h2>
<p>The next generation of wearables with quantum sensors for unprecedented health monitoring.</p>

<h2>2. Holographic Displays</h2>
<p>Revolutionary display technology that brings 3D content to life.</p>

<h2>3. Neural Headsets</h2>
<p>Mind-controlled devices that respond to your thoughts.</p>

<h2>4. Smart Home Hubs</h2>
<p>AI-powered central controllers for the connected home.</p>

<h2>5. Portable Power Stations</h2>
<p>High-capacity, fast-charging power solutions for modern life.</p>

<p>Stay tuned to our blog for in-depth reviews and analysis of these exciting new technologies.</p>',
                'status' => 'draft',
                'published_at' => null,
                'categories' => ['Gadget Reviews', 'Technology Trends'],
                'tags' => ['Gadgets', 'Technology', 'Smartwatch', 'AI'],
            ],
            [
                'title' => 'Customer Success Story: From Broken Phone to Happy Customer',
                'excerpt' => 'How we helped Sarah get her phone back in perfect working condition.',
                'content' => '<p>Sarah came to us with a severely damaged iPhone that had been dropped multiple times. The screen was shattered, and the phone wouldn\'t turn on. Here\'s her story.</p>

<h2>The Problem</h2>
<p>Sarah\'s iPhone 13 Pro had suffered multiple drops, resulting in a completely shattered screen and internal damage. The phone was completely unresponsive.</p>

<h2>Our Solution</h2>
<p>Our technicians performed a comprehensive diagnostic and found that both the screen and the logic board needed replacement. We used genuine Apple parts and our expertise to restore the phone to perfect working condition.</p>

<h2>The Result</h2>
<p>Sarah\'s phone now works better than ever. She was amazed at how we could restore her device to its original condition.</p>

<p>"I thought my phone was gone forever," Sarah said. "Multicop Tech brought it back to life. I\'m so grateful!"</p>

<p>This is just one of many success stories we create every day. Your satisfaction drives everything we do.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'categories' => ['Customer Stories'],
                'tags' => ['iPhone', 'Repair', 'Customer', 'Success'],
            ],
        ];

        foreach ($blogs as $blogData) {
            $categories = $blogData['categories'] ?? [];
            $tags = $blogData['tags'] ?? [];

            unset($blogData['categories'], $blogData['tags']);

            $blog = Blog::create(array_merge($blogData, [
                'author_id' => $admin->id,
            ]));

            // Attach categories
            if (!empty($categories)) {
                $categoryIds = Category::whereIn('name', $categories)->pluck('id');
                $blog->categories()->attach($categoryIds);
            }

            // Attach tags
            if (!empty($tags)) {
                $tagIds = Tag::whereIn('name', $tags)->pluck('id');
                $blog->tags()->attach($tagIds);
            }
        }

        $this->command->info('Sample blog data created successfully!');
        $this->command->info('Created ' . count($categories) . ' categories');
        $this->command->info('Created ' . count($tags) . ' tags');
        $this->command->info('Created ' . count($blogs) . ' blog posts');
    }
}
