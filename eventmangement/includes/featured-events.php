<?php
// In a real application, this would fetch events from the database
// For demo purposes, we'll use dummy data
$featuredEvents = [
    [
        'id' => 1,
        'title' => 'Summer Music Festival 2025',
        'date' => 'June 15-17, 2025',
        'location' => 'Central Park, New York',
        'category' => 'music',
        'image' => 'https://images.pexels.com/photos/1190297/pexels-photo-1190297.jpeg'
    ],
    [
        'id' => 2,
        'title' => 'Business Conference 2025',
        'date' => 'May 10, 2025',
        'location' => 'Convention Center, Chicago',
        'category' => 'business',
        'image' => 'https://images.pexels.com/photos/2566581/pexels-photo-2566581.jpeg'
    ],
    [
        'id' => 3,
        'title' => 'Food Festival',
        'date' => 'April 8-10, 2025',
        'location' => 'Downtown, Miami',
        'category' => 'food',
        'image' => 'https://images.pexels.com/photos/5638732/pexels-photo-5638732.jpeg'
    ]
];

// Display featured events
foreach ($featuredEvents as $event):
?>
<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all">
    <div class="relative h-48">
        <img src="<?php echo $event['image']; ?>" alt="<?php echo $event['title']; ?>" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4">
            <span class="inline-block bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full"><?php echo ucfirst($event['category']); ?></span>
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-xl font-bold mb-2"><?php echo $event['title']; ?></h3>
        <div class="flex items-center text-sm text-gray-500 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span><?php echo $event['date']; ?></span>
        </div>
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span><?php echo $event['location']; ?></span>
        </div>
        <a href="event-details.php?id=<?php echo $event['id']; ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all">View Details</a>
    </div>
</div>
<?php endforeach; ?>