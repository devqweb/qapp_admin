-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 03:44 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `app_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `telcode_mobile` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `telcode_whatsapp` varchar(100) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `last_update` date NOT NULL,
  `tags` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `video_link` text NOT NULL,
  `android_link` text NOT NULL,
  `ios_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `facebook_link` text NOT NULL,
  `website` text NOT NULL,
  `app_rating` float NOT NULL,
  `app_installs` int(11) NOT NULL,
  `app_size` float NOT NULL COMMENT 'mb',
  `english` tinyint(1) NOT NULL,
  `arabic` tinyint(1) NOT NULL,
  `app_icon` varchar(100) NOT NULL,
  `t_c` tinyint(1) NOT NULL,
  `a_c` tinyint(1) NOT NULL,
  `promotion` int(1) NOT NULL,
  `promotion_start` timestamp NULL DEFAULT NULL,
  `promotion_end` timestamp NULL DEFAULT NULL,
  `last_renew_promotion` timestamp NULL DEFAULT NULL,
  `featured_app` int(11) NOT NULL,
  `latest_release` int(11) NOT NULL,
  `useful_app` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `details_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enable_disable` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`app_id`, `added_by`, `app_name`, `company_name`, `contact_person`, `telcode_mobile`, `mobile`, `telcode_whatsapp`, `whatsapp`, `email`, `category`, `last_update`, `tags`, `description`, `video_link`, `android_link`, `ios_link`, `instagram_link`, `facebook_link`, `website`, `app_rating`, `app_installs`, `app_size`, `english`, `arabic`, `app_icon`, `t_c`, `a_c`, `promotion`, `promotion_start`, `promotion_end`, `last_renew_promotion`, `featured_app`, `latest_release`, `useful_app`, `datetime`, `details_update`, `enable_disable`) VALUES
(24, 0, 'Qatar Airways', 'Qatar Airways', 'Akbar Al Baker', '+974', '987845632', '+971', '12345678', 'info@qa.com', 84, '2021-01-12', 'qatar airways,book flight qatar airways,qatar airways booking,flight status,online checkin qatar airways,download eticket qatar airways', 'Award-winning journeys, at your fingertips.\n\nBook flights, check in, manage bookings and take full control of your journey with the Qatar Airways mobile app.\n\nBook flights\n\nWith a tap of a finger, find and book flights to more than 160 destinations around the world. Use our timetable function to find the most convenient flight options for your journey. Our app enables you to book one-way, return or multi-city trips, and book Award tickets with Qatar Airways using your Qmiles.\n\nBooking flights through the mobile app also gives you the added advantage of a simplified booking process, allowing you to enter your travel details simply by pointing your phone camera at your passport.\n\nVarious payment options\n\nWhen booking through the mobile app, you can take advantage of a range of payment options available worldwide and specifically in your country. If you are undecided about your reservation, you can use our app to hold your booking along with the guaranteed fare for up to 72 hours, in exchange of a minimum fee.\n\nComplement your journey\n\nEnhance your journey with an array of additional services. Through the app, you can purchase excess baggage as well as book lounge access, meet and greet services, hotel stay, and car rental. If you are a resident of certain countries, you will also have the option to purchase travel insurance during booking or by managing your pre-existing booking through our mobile app.\n\nMy trips\n\nManage your booking conveniently using the Qatar Airways mobile app by adding it to “My Trips”. Once added, the app will help you keep track of every step throughout your journey, sending you flight notifications about check-in, boarding, baggage collection and upgrade offers.\n\n“My Trips” also allows you to conveniently manage your booking, change your seat and meal preferences, modify your flight details, purchase excess baggage and much more.\n\nCheck in\n\nCheck in through the mobile app simply by pointing your mobile camera at your passport details page. Choose your seat, view/save your boarding pass and use the fast-bag-drop counters at the airport to check in your bags.\n\nFlight status notifications\n\nThrough the mobile app, you can request arrival and departure information on all Qatar Airways flights and receive updated information on the status of your flight directly on your smartphone via a push message.\n\nOffers\n\nCheck our special fares and find great deals to that destination you\'ve always wanted to visit through the mobile app. You will always find the same fare available on the website at the time of search (and sometimes, you may even discounted fares when booking on mobile during certain promotions).\n\nTrack bag\n\nIn cases of delayed or mishandled baggage, you can ensure your baggage’s safe and timely delivery upon your arrival to your destination, through tracking its journey using the mobile app.\n\nPrivilege Club\n\nThrough the mobile app, Privilege Club members can easily:\n- Access their dashboard and view account details, latest activities, upcoming trips and more.\n- Use the Qcalculator to check the Qmiles and Qpoints that can be earned on flights, as well as the Qmiles required for Award redemption with Qatar Airways and partner airlines.\n- Stay up to date with the latest offers from Privilege Club and register for them.\n- Communicate with the Privilege Club member service center easy processing of requests.\n- Claim missing Qmiles on past flights.\n- Generate statements for any given period of time.\n- Update profile and communication preferences for emails and SMS from Qatar Airways.\n\nOther features\n\nAdditionally, the Qatar Airways mobile app also allows you to:\n- Access the airport map for Hamad International Airport for easy navigation during your journey\n- View the contact details of Qatar Airways offices worldwide\n- Find the visa and passport requirements for your journey to your desired destination', 'https://www.youtube.com/user/qatarairways', 'https://play.google.com/store/apps/details?id=com.m.qr', 'https://ios.com/userguide3/libraries/form_validation.html#', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://www.facebook.com/qatarairways/', 'https://qatarairways.com/', 4.3, 170053, 102, 1, 1, '737f15490a19b8b3243cf77783bc54c0.jpg', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-30 08:05:55', '2021-02-02 11:35:24', 1),
(25, 0, 'YouTube', 'Google LLC', 'Sundar Pichai', '+1', '789456120', '+91', '9876543210', 'info@youtube.com', 85, '2021-01-21', 'youtube,online video player,upload video,watch movies,live streaming', 'Get the official YouTube app for Android phones and tablets. See what the world is watching -- from the hottest music videos to what’s trending in gaming, entertainment, news, and more. Subscribe to channels you love, share with friends, and watch on any device.\r\n\r\nWith a new design, you can have fun exploring videos you love more easily and quickly than before. Just tap an icon or swipe to switch between recommended videos, your subscriptions, or your account. You can also subscribe to your favorite channels, create playlists, edit and upload videos, express yourself with comments or shares, cast a video to your TV, and more – all from inside the app.\r\n\r\nFIND VIDEOS YOU LOVE FAST\r\n\r\n• Browse personal recommendations on the Home tab\r\n\r\n• See the latest from your favorite channels on the Subscriptions tab\r\n\r\n• Look up videos you’ve watched and liked on the Account tab\r\n\r\nCONNECT AND SHARE\r\n\r\n• Let people know how you feel with likes, comments, and shares\r\n\r\n• Upload and edit your own videos with filters and music – all inside the app', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=com.google.android.youtube', 'https://ios.com/userguide3/libraries/form_validation.html#', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://facebook.com/userguide3/libraries/form_validation.html#', 'https://www.youtube.com/', 4.2, 2147483647, 0, 1, 0, 'b7b1393a2082f9f80b52472047ae046f.jpg', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-30 08:47:01', '2021-01-30 11:21:10', 1),
(26, 0, 'Ad Maker - Create Your Own Advertisement', 'Photo Studio & Picture Editor LabBusiness', 'Johson Joe', '+974', '5648944', '+965', '45632185', 'johnCreater@gmail.com', 63, '2020-12-31', 'advertizement,create ad,banner ad creater,create ad poster', 'Best advertisement maker app to create an advertisement for your products or services.\r\n\r\nYou don\'t need to hire a graphic designer to create a professional advertising design for your product for sales. We\'ve designed a good collection of advertising flyers for many products and make it editable through this ad maker app.\r\n\r\nKey Features:\r\n1. 1000+ advertisement templates\r\n2. Search for the design from the template collection\r\n3. Just select the template and customize\r\n4. Backgrounds & stickers OR add your own\r\n5. Fonts OR add your own option\r\n6. Crop images in various shapes\r\n7. Text Arts\r\n8. Multiple Layers\r\n9. Undo/Redo\r\n10. AutoSave\r\n11. Re-Edit\r\n12. Save On SD Card\r\n13. SHARE on Social Media\r\n\r\nAdvertisement Maker App Is Useful For\r\nAdvertise an event\r\nSell a service\r\nPromote a product\r\nMarket a course\r\nRetain your audience for longer\r\nExplain your service with ease\r\nGet higher conversion rates and sales\r\nRaise Awareness\r\nIncrease Social Media Engagement\r\n\r\nEven though advertising has gotten much more high-tech in recent years, digital posters are still a popular and effective form of social media marketing.\r\n\r\nGreat graphic design is a key to great social media marketing, ad maker is an app to create a graphic design for social media marketing for small businesses.\r\n\r\nThis app is also useful for social media marketing, branding, graphic design, and for making a signboard advertisement.\r\n\r\nAdvertisement Maker\r\nOur monthly, Six monthly or annual premium subscription unlocks all of the highly valuable features built to help you grow your business. Subscriptions renew automatically and include access to all of the following features:\r\n\r\n• Remove Ads\r\n• Access to all premium templates, graphics, fonts, unique resize the image, crop image\r\n\r\nSubscription Details:\r\nPayment for Ad Maker will be charged to your Google Play Account at confirmation of purchase. Your Ad Maker subscription will automatically renew unless auto-renew is turned off within your Google Play Account at least 24-hours before the end of the current subscription billing period.\r\nYou can manage your subscription or turn off auto-renew in your Google Play Account settings after purchase. If you turn off auto-renew in the middle of a subscription period, you will still have access to all premium features until the end of the period. No partial refunds will be given for turning off auto-renew in the middle of a subscription period.\r\n\r\nPlease rate the app and give your feedback to help us improve and create many more unique apps for you.', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=com.nra.productmarketingmaker', '', 'https://www.instagram.com/qatarairways/?hl=en', 'https://facebook.com/', 'https://play.google.com/store/apps/details?id=com.nra.productmarketingmaker', 3, 500000, 17, 1, 0, 'b988d5b411daadf316545cdbb77ce7be.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-30 09:23:42', '2021-01-30 11:21:07', 1),
(27, 0, 'Lose Weight at Home - Home Workout in 30 Days', 'Simple Design Ltd', 'Sara Jolie', '+974', '65448489', '+974', '78945612', 'saraj@gmail.com', 68, '2021-01-19', 'womes fitness app,women workout,weight loss,women meal plan,fitness goal,women exercise,women body training plan', '★Best of 2017 App★\r\n★Best Hidden Gem App★\r\n★Best Daily Helper App★\r\n\r\nLose Weight in 30 Days is designed for you to lose weight in a fast and safe way. Not only does it have systematic workouts, but it also provides diet plans at your disposal. It is scientifically proven to help improve your health and fitness. Your workout and calorie data can be synchronized on Google Fit. Stick with the program, and your body will be more beautiful than ever before you know it.\r\n\r\nThe workout plan contains arm, butt, abdominal and leg workouts to help you lose your extra weight and shape your body. With animations and video guidance, you can make sure you use the right form during every exercise. There\'s no equipment needed, so you can easily do your workouts at home or anywhere at any time.\r\n\r\nYou can track your weight loss progress in graphs and clearly count your calories. You can also set targets for self-encouragement. Since exercise intensity increases step-by-step, don’t forget to take a break every three days so your body can adjust.\r\n\r\nFeatures\r\n\r\n- Track weight loss progress\r\n- Track burned calories\r\n- Low calorie diet plans\r\n- Animations and video guidance\r\n- Various workouts\r\n- Gradually increases exercise intensity\r\n\r\nBest Weight Loss Apps\r\nLooking for fitness apps? Want to lose weight fast? No satisfied weight loss apps? Lose weight in 30 days can help you lose weight fast. Try lose weight in 30 days now to workout and lose weight fast. It\'s also a best diet plan weight loss apps.\r\n\r\nWorkout at Home\r\nTake a few minutes a day to keep fit and lose weight with our sport, diet and workout at home. No equipment needed, just use your bodyweight to workout at home.\r\n\r\nWeight Loss Apps Free for Women\r\nHard to lose weight? This fitness apps and weight loss apps free for women is designed by expert, you can lose weight safe and fast with our diet plan, fitness apps and weight loss apps free for women.\r\n\r\nFemale Fitness App\r\nKeep fit and lose belly fat with diet plan weight loss apps - workout for women. This female fitness app has professional lose belly fat workout and workout for women. All these lose belly fat workout and workout for women can be done anywhere at anytime.\r\n\r\nBelly Fat Burning\r\nThis female fitness app has belly fat burning workouts, female workout, exercise for women, core workout. These belly fat burning workouts, female workout, exercise for women and core workout proved to help tone your body. Sweat with our female workout, core workout and exercise for women!\r\n\r\nFat Burning Workouts & Hiit Workouts\r\nThe best diet plan weight loss apps, fat burning workouts & hiit workouts for better body shape. Burn calories with fat burning workouts, and combine with hiit workouts to get the best results.\r\n\r\nFitness Coach\r\nAll sport & workouts are designed by professional fitness coach. Workout guide through the sport & exercise, just like having a personal fitness coach in your pocket!', 'https://www.youtube.com/user/qatarairways', 'https://play.google.com/store/apps/details?id=loseweight.weightloss.workout.fitness', 'https://play.google.com/store/apps/details?id=loseweight.weightloss.workout.fitness', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://facebook.com/userguide3/libraries/form_validation.html#', 'https://play.google.com/store/apps/details?id=loseweight.weightloss.workout.fitness', 3, 50000000, 19, 1, 0, '1f7ee04355fcc17049ea2dc336e5a016.jpg', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-30 09:44:45', '2021-02-02 11:21:18', 1),
(28, 0, 'Home Workout - No Equipment', 'Leap Fitness Group', 'Lee John', '+971', '65478921', '+971', '12365478', 'johnlee@gmail.com', 68, '2020-12-11', 'home workout,transform body,muscle building,weight loss,meal plan,diet plan for weight gain,calories count', 'Home Workouts provides daily workout routines for all your main muscle groups. In just a few minutes a day, you can build muscles and keep fitness at home without having to go to the gym. No equipment or coach needed, all exercises can be performed with just your body weight.\r\n\r\nThe app has workouts for your abs, chest, legs, arms and butt as well as full body workouts. All the workouts are designed by experts. None of them need equipment, so there\'s no need to go to the gym. Even though it just takes a few minutes a day, it can effectively tone your muscles and help you get six pack abs at home.\r\n\r\nThe warm-up and stretching routines are designed to make sure you exercise in a scientific way. With animations and video guidance for each exercise, you can make sure you use the right form during each exercise.\r\n\r\nStick with our home workouts, and you will notice a change in your body in just a few short weeks.\r\n\r\nFeatures\r\n*Warm-up and stretching routines\r\n*Records training progress automatically\r\n*The chart tracks your weight trends\r\n*Customize your workout reminders\r\n*Detailed video and animation guides\r\n*Lose weight with a personal trainer\r\n*Share with your friends on social media\r\n\r\nBodybuilding App\r\nLooking for a bodybuilding app? No satisfied bodybuilding app? Try our build muscle app! This build muscle app has effective muscle building workout, and all muscle building workout is designed by expert.\r\n\r\nStrength Training App\r\nIt\'s not only just a build muscle app, but also a strength training app. If you are still looking for muscle building workout, muscle building apps or strength training app, this muscle building apps is the best one you can find among the muscle building apps.\r\n\r\nHome Workouts for Men\r\nWant effective home workouts for men? We provide different home workouts for men to workout at home. The home workout for men is proven to help you get six pack abs in a short time. You\'ll find the home workout for men that most suitable for you. Try our home workout for men now!\r\n\r\nFat Burning Workouts & Hiit Workouts\r\nThe best fat burning workouts & hiit workouts for better body shape. Burn calories with fat burning workouts, and combine with hiit workouts to get the best results.\r\n\r\nMultiple Exercises\r\nPush ups, squats, sit ups, plank, crunch, wall sit, jumping jacks, punch, triceps dips, lunges...\r\n\r\nFitness Coach\r\nThe best fitness apps and workout apps. All sport and gym workout in this workout apps and fitness apps are designed by professional fitness coach. Sport and gym workout guide through the exercise, gym workout and sport, just like having a personal fitness coach in your pocket!', 'https://www.youtube.com/watch?v=-seG9em_m2Q', 'https://play.google.com/store/apps/details?id=homeworkout.homeworkouts.noequipment', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://www.instagram.com/qatarairways/?hl=en', 'https://facebook.com/', 'https://play.google.com/store/apps/details?id=homeworkout.homeworkouts.noequipment', 3, 100000000, 17, 1, 0, '3666f16d5d09719c4caf28acbf184c6e.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-30 09:50:35', '2021-01-30 11:21:02', 1),
(29, 0, 'Bookingcar - car rental comparison', 'TravelTech', 'Ramesh Joshi', '+91', '9874563210', '+91', '4563217898', 'ramesh@gmail.com', 80, '2019-02-19', 'rent car,car rantal service,car rent price compare,car rent in qatar,car rent in india,international car rental app,car rent near me', 'The Bookingcar app is the best way to rent a car on the most favorable terms.\r\n\r\nWhy should you rent a car via Bookingcar?\r\n\r\n✔ It\'s free to change or cancel your order 24 hours before the start of the rental\r\n\r\n✔ No hidden fees.\r\nWe do not charge a fee for credit cards processing or any other administrative fees.\r\nAll the car rental costs are indicated at the time of booking and in the rental conditions.\r\n\r\n✔ Greatest possible discounts.\r\nWe offer competitive rates from all major global car rental companies. Save up to 70%.\r\n\r\n✔ Our international customer service center is available 7 days a week, 24 hours a day.\r\n\r\n✔ Our technologies allow you to select the most advantageous offers, simultaneously comparing prices from 1000+ car rental companies. Our partners receive over 5,000 orders from our company every day, and so we can offer the lowest prices on the market.\r\n\r\n✔ Vehicles of any class: mini, economy, standard, business, convertible, estate, minivan, luxury.\r\n\r\n✔ 50,000+ rental stations worldwide.\r\nWe offer the opportunity to book a car at any of the 50,000+ rental locations across 160 countries.\r\n\r\nWith our app, you can book a vehicle from the following rental companies:\r\nAlamo, National, Enterprise, International, Sixt, Hertz, Thrifty, Budget, Advantage, Dollar, Europcar, Avis, Payless, Ace, Ez, Fox24, Economy car rental, Mex, Green Motion, Easirent, Addcar, Silvercar.\r\n\r\nSpecial discounts at international airports:\r\nThanks to joint promotions with the best car rental companies, we can offer the most advantageous prices at the largest international airports. In many cases, you can also book additional options for free: additional driver, GPS, one-way rental, etc.\r\nThe airports with the largest number of discounts and special offers are:\r\nBarcelona Airport car hire\r\nCatania Airport\r\nMunich Airport\r\nMilan Airport\r\n\r\nRent a car near your current location:\r\nTake advantage of the “car rental nearby” feature: we will search across the nearest offices, show you the best deals and give you an opportunity to quickly book the vehicle of your choice.\r\n\r\nBooking car – the best car rental deals.\r\nCompare the offers from all international and local car rental companies at the same time. Thanks to the convenient search, quick booking and best conditions, you can save time and up to 70% of the basic rental price.\r\n\r\nsupport@bookingcar.eu', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=eu.bookingcar', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://facebook.com/', 'https://www.eshals.com/', 3, 100, 0, 1, 0, '167bf3c6d7e204527ee9127192b2d278.jpg', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-30 13:00:39', '2021-01-30 13:22:51', 1),
(30, 0, 'The Peninsula', 'Dar Al Sharq', 'Abdulla Radwani', '+974', '45632100', '+971', '45678910', 'abdulla@daralsharq.com', 64, '2018-02-12', 'news,qatar news,online news,newspaper,breaking news qatar,the peninsula,peninsula mobile application,qatar latest news,qatar favorite news paper', 'The app of Qatar’s favorite newspaper. Updated regularly. Keep on top of what’s happening in Qatar and around the world.', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=com.thepeninsulaqatar.daralsharq', 'https://play.google.com/store/apps/details?id=com.thepeninsulaqatar.daralsharq', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://facebook.com/', 'https://www.thepeninsulaqatar.com', 3, 10, 2.6, 1, 1, '5511fc524ae2c98c84e1f76adaced713.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-31 08:23:46', '2021-01-31 08:23:58', 1),
(31, 0, 'Radio Suno 91.7 - Kettu Kettu Koottu Koodaam', 'OLIVE SUNO RADIO NETWORK', 'Akbar Tamim', '+974', '33111063', '+974', '33111063', 'info@olive.qa', 88, '2020-12-18', 'radio suno,radio suno qatar,qatar radio,radio olive,hindi radio,malyalam radio,olive netword qatar', 'Official App for RADIO SUNO 2020 New Update.\r\n\r\nNew Features:\r\n• Listen to live radio on the move.\r\n• Added New Radio Stations.\r\n• New User interface and easy to use controls.\r\n• Compatible to all Android Devices.\r\n• Social Media Connect from App.\r\n• Write to us using whats app from the App.\r\n\r\n\r\nMore Interesting features coming soon.', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=com.olive.radioolive', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://facebook.com/', 'https://olive.qa/', 5, 1, 13, 1, 0, 'aab56ec64f2aa33eeeb9584ed1fa5fd6.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-31 08:35:20', '2021-01-31 08:35:31', 1),
(32, 0, 'Qaddress QATAR', 'Ahmad Shaman Al Ani', 'Ahmed Shaman', '+974', '63985412', '+974', '14852670', 'ahmed@gmail.com', 86, '2020-09-02', 'qatar map,road map qatar,qaddress Qatar,find location qatar,doha map', 'Qaddress is a simple application useful to find the map location and GPS coordinates of places in Qatar based on the new Qatar Area Referencing System (QARS). All what you need is the address numbers of the building (not its name). This application work for all areas of Qatar such as Doha, Wakra, Al-Khor and others.\r\n\r\nPlanning a party? Share the location information so they can find you easily.\r\n\r\nYou have GPS system in your car but cannot search location using building numbers? Use this application and enter the GPS coordinates into the car GPS system.\r\n\r\nDoes your business require going places? All you need to ask your customer are their Building/Street/Zone numbers.\r\n\r\n\r\nFor iPhone, please use http://myqplace.info', 'https://www.youtube.com/watch?v=-seG9em_m2Q', 'https://play.google.com/store/apps/details?id=com.Qaddress.qatar', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://www.facebook.com/qatarairways/', '', 4.6, 100, 7.4, 1, 1, '89c4690fc08972c929aaea5fb8cf07d5.jpg', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-31 11:20:57', '2021-01-31 11:28:02', 1),
(33, 0, 'Lulu Shopping', 'Lulu Group International', 'Venkat Mani', '+974', '95135468', '+91', '9856321407', 'Venkat@gmail.com', 89, '2021-01-06', 'lulu hyper market,lulu online store,lulu webstore,online market qatar,qatar online shoping,ecommerce,buy products online', 'Loaded with amazing features, this application will keep you updated about all the\r\nlatest happenings, best offers, deals and more at your nearest LuLu Hypermarket &\r\nLuLu Webstore.\r\n\r\nHere’s what the app can do for you:\r\n\r\nIn-store Offers:\r\n\r\nFrom daily grocery to electronics, this app will keep you updated about all the offers\r\nat LuLu. Not just that, with the app you can find the best deals according to your\r\nnearest LuLu Hypermarket.\r\n\r\nWebstore offers:\r\n\r\nThe LuLu Webstore section is made for those who love to shop from the comfort of\r\ntheir living room.\r\nYou can now get notifications about the newest offers and deals at LuLu Webstore.\r\nYou can also browse through our inexhaustible offers on electronics, home decor,\r\nhealth and beauty and much more.\r\n\r\nStore Locator\r\n\r\nFind a LuLu Hypermarket that is closest to you in a jiffy! Our app will track your\r\nlocation and suggest the nearest LuLu Hypermarket from where you can shop.\r\n\r\nCustomer Service\r\n\r\nComments, suggestions or a note of gratitude, you can leave your opinion about our\r\nhypermarkets and services on our customer service section via email & our team will\r\nacknowledge it as soon as possible.\r\n\r\nAdditional Features\r\n\r\nStay connected with all our social media channels with our LuLu Social section. You\r\ncan also read awesome articles about a variety of topics in our LuLu Good Life section.', 'https://www.youtube.com/user/qatarairways', 'https://play.google.com/store/apps/details?id=com.lulu.commerce', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://www.instagram.com/qatarairways/?hl=en', 'https://facebook.com/', 'https://lulu.com/', 4.1, 1, 12, 1, 1, '9fd892361dab0447da1258fa99d7e88e.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-01-31 11:27:49', '2021-01-31 11:37:44', 1),
(34, 0, 'Radio Olive 106.3 - Jiyo Bindass', 'OLIVE SUNO RADIO NETWORK', 'Hussein Al Mahadi', '+974', '29741605', '+974', '33111063', 'info@olive.qa', 88, '2020-12-18', 'radio olive,qatar radio station,hindi radio station,online radio station', 'OLIVE SUNO RADIO NETWORK\r\nOfficial App for RADIO OLIVE.\r\n\r\nNew Features\r\nRelease 10102020\r\n\r\n• Added New slide in the intro.\r\n• Updated the splash screen.\r\n• Now you can chat in the App.\r\n• Listen to live radio on the move.\r\n• Added New Radio Stations.\r\n• New User interface and easy to use controls.\r\n• Compatible with all Android Devices.\r\n• Social Media Connect from App.\r\n• Bugs fixed.\r\n• Push Notifications enhanced.\r\n\r\n\r\nMore Interesting features coming soon.', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=com.olive.oliveonline', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://www.instagram.com/qatarairways/?hl=en', 'https://facebook.com/', 'https://www.olive.qa', 4.1, 1000, 14, 1, 1, 'd22187c64c079fbc0d7388acd633e394.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-02-02 06:23:13', '2021-02-02 08:03:40', 1),
(35, 0, 'QApp', 'Genesis', 'Vimal Vincent', '+974', '54062187', '+974', '65410238', 'info@qweb.qa', 63, '2021-01-12', 'advertizement,qapp,qweb qatar,app promotion,business promotion,free promotion,app listing application,genesis advertizement', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.youtube.com/', 'https://play.google.com/store/apps/details?id=com.m.qr', 'https://apps.apple.com/us/app/qatar-airways/id581264644', 'https://www.instagram.com/qatarairways/?hl=en', 'https://facebook.com/', 'https://qapp.qa/', 4.2, 2650, 9.5, 1, 1, 'd0ed015182f1e5dc3b4aec2171ef8691.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-02-02 07:41:14', '2021-02-02 08:03:38', 1),
(36, 0, 'Limitless', 'Genesis', 'Vimal Vincent', '+974', '987845632', '+974', '78945612', 'vincent@test.com', 68, '2021-01-28', 'limitless sport,limitless qatar,qatar sports consultancy,genesis advertizement', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.youtube.com/watch?v=-seG9em_m2Q', 'https://play.google.com/store/apps/details?id=com.m.qr', 'https://ios.com/userguide3/libraries/form_validation.html#', 'https://instagram.com/userguide3/libraries/form_validation.html#', 'https://facebook.com/', 'https://limitless.com/', 4.6, 2000, 7, 1, 1, '3cb899d5edcdc8f8c46c5361046669ff.png', 1, 1, 0, NULL, NULL, NULL, 0, 0, 0, '2021-02-02 07:59:51', '2021-02-02 08:03:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_in_slider` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `enable_disable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `order_in_slider`, `image`, `enable_disable`) VALUES
(63, 'Advertisement', 1, '34cd2f8c7524a458893ff7eee2a921ab.png', 1),
(64, 'News', 15, '7e298a88e45e66933528243c37b7929e.png', 1),
(66, 'Restaurant', 6, '028bc072c58808f8cf121bdb4f36e70d.png', 1),
(67, 'Telecom & Network', 14, '53b3b54d2958bf6306c4b3b9950e523c.png', 1),
(68, 'Sports & Fitness', 3, 'e1eeec5e4e962a53dbce547329f63609.png', 1),
(69, 'Grocery', 2, 'e0cd36a5e6c8dc79ff2aee91b81860f5.png', 1),
(70, 'House Keeping', 4, 'd538fc213e0d7c98b13d42d0ebadaae6.png', 1),
(71, 'Jewellery', 5, '3f001dcd927b608713e26082c0cf0c04.png', 1),
(72, 'Pest Control', 7, '30fa695c6a89cef9b1002186c099354c.png', 1),
(73, 'Life Style', 8, '0214169283adc78f9ab6f415a3ddcefe.png', 1),
(74, 'Coffee Shop', 9, '5ff343653dc12041bdedcae9a6e3c682.png', 1),
(75, 'Beauty and Spa', 10, '99af5b5671aa1f61447e9fa1fadd1efc.png', 1),
(76, 'Cinema', 11, 'b86c3aef0046c81b2c34d0523db0b792.png', 1),
(77, 'Construction', 16, 'dacfa6b35a7dd2516e957fb5a91821ec.png', 1),
(78, 'Mall', 17, '6bccd90d5acf8c630d5793de94f861f2.png', 1),
(79, 'House Hold', 12, '937b4503fd662f2db4692b5907e1642e.png', 1),
(80, 'Car Rent', 18, '642bf45c5084703e8546a8c0198bdc50.png', 1),
(81, 'Fashion', 13, 'e30489495ba6c8696785f7c7cbc233c1.png', 1),
(83, 'Security', 19, 'd2c1252989439fa5f8d013bf76392212.png', 1),
(84, 'Airline Aviation Aerospace', 20, 'f6db2d794460702b0e427691b8c0e5a0.png', 1),
(85, 'Video Stream', 21, '8a8089e31ea9504e2c568f2d37b9f21f.png', 1),
(86, 'Map and Location', 22, '616574e6f4b2332cdd2cf1974971c491.png', 1),
(87, 'Job Portal', 23, '5d928d66a95cc099e963c5734b2ca693.png', 1),
(88, 'Radio Station', 24, 'f70809f88312bfd09412bcd0e5c76970.png', 1),
(89, 'E-Commerce', 25, '823744b12d960c194e1b2e43192375d9.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `home_slider_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `button_link` text NOT NULL,
  `order_slider` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `enable_disable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`home_slider_id`, `title`, `description`, `button_link`, `order_slider`, `image_name`, `enable_disable`) VALUES
(12, 'Make It Easy With Our App', 'Lorem Ipsum is simply dummy text of the printing and typesetting\nindustry. Lorem Ipsum has been the industry\'s standard dummy\ntext ever since the 1500s.', 'https://qapp.com/', 1, '248e4f269b524d472d6f644901b1709a.png', 1),
(13, 'Best Listing App Qatar', 'Lorem Ipsum is simply dummy text of the printing and typesetting\r\nindustry. Lorem Ipsum has been the industry\'s standard dummy\r\ntext ever since the 1500s', 'https://genesis.com/', 2, '124e04dd81db322b1e4df30b6abe86bf.png', 1),
(14, 'Grow your App with Us', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 'https://qapp.com/', 3, '79a7e18c9a85425ef3952fb0fd255454.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promo_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `validity` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `enable_disable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `type`, `validity`, `price`, `description`, `image`, `enable_disable`) VALUES
(2, 'App of the Week', 7, 250, 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.', 'fea1bfd31e86d28de7b93b7cc6812ebd.png', 1),
(3, 'App of the month', 30, 500, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '986172ba6242e4817984b00e0a9c20ba.png', 1),
(4, 'Banner 1', 15, 350, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.', 'a688dc4d708fea4fada903c3e6414ddd.png', 1),
(5, 'Banner 2', 15, 650, 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '2e42dd4fc562715dd2e63f4138c4c4d7.png', 1),
(6, 'Home Slider', 3, 100, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain', 'e9275feb1df8a46c85dee23b674afd25.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `screenshot_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`screenshot_id`, `app_id`, `image`) VALUES
(93, 24, 'c9f07bdddb909a482f7fcf8a2f59aee7.jpg'),
(94, 24, '88441aae3606859c90555cdcb45e9739.jpg'),
(95, 24, '484310d8e9d69e76b491b592e6a522db.jpg'),
(96, 24, 'd675822cab60512395f8764a846256bd.jpg'),
(97, 24, '919b61223775a972911375767ae14523.jpg'),
(98, 24, '4cc1691c46685503dfcb739fb29ea19c.jpg'),
(99, 25, 'cb7ac6c3f3c4793a3db396ac2117f790.jpg'),
(100, 25, '7b3ae736afb30380a2f0a8c3226ffa46.jpg'),
(101, 25, '0e2dad36c4d5629ed6a8b9c488b4621b.jpg'),
(102, 26, '4392aed077c4e31852bede8463fb44dc.jpg'),
(103, 26, '1edbd59c535a5fb677450b6bc471abd8.jpg'),
(104, 26, '26a89e1ae215d66168e7ec40112694e0.jpg'),
(105, 26, 'a831bc4b7d4b77bd17e62d1ed36177a8.jpg'),
(106, 26, '4bb1355ef5b816ddf24f65cb0bbcc340.jpg'),
(107, 26, '54020906672e4a7d3c26c9216f6d8218.jpg'),
(115, 28, '1ca4a096e31ed3e1bd40a35247d85b53.jpg'),
(116, 28, 'b906d4197fbdc96f7ccb7c807f258cff.jpg'),
(117, 28, '8f42f604f5cc33b836c42bd2efeed1ac.jpg'),
(118, 28, 'e84dd0653929d397d31e81b7e918b5c6.jpg'),
(119, 28, '4b46803a5687ed50e390c3195ba26aca.jpg'),
(120, 28, '206bdcfc8369f76d47630451bf5a7497.jpg'),
(121, 28, '5715ec8ceb16cd567380e80135a60f90.jpg'),
(122, 28, '086d46f6adecff60918eae8e1990bc8c.jpg'),
(123, 28, 'fad13cc1df79f6453a96d051c547e5e1.jpg'),
(124, 29, '09f3325ec024eb6ca6aa49c5f65fd0c1.jpg'),
(125, 29, '923d3d762de39f2127c9563d5c3f58ea.jpg'),
(126, 29, '36df3c7c8a9b3d4d3e5baf1eff29a567.jpg'),
(127, 29, '8b7700cf8245c646d19773e3bc235415.jpg'),
(128, 29, 'b1f0d3eed8a1260f65eb2e89d644b516.jpg'),
(129, 29, 'fc7407684bd55b2ecb30ed67577b1559.jpg'),
(130, 29, '1b44eef59c96308c75e0bb741beff2b7.jpg'),
(131, 29, '22e8f3faef236c298afccc725a6b6874.jpg'),
(132, 29, '54abb4ec72ff8a708296762d97f48820.jpg'),
(137, 31, '89b6e8c22958d5bc5183a2211ae3102c.jpg'),
(138, 31, 'ded37881d2d4b21b7f75ecc9922134fd.jpg'),
(139, 31, '718cd7a64a9a2b271ec7ea80f37900df.jpg'),
(140, 32, 'f3009e1549f7a36a51c271df12c1355e.jpg'),
(141, 32, 'd97b13a3531676d466491372fd908865.jpg'),
(142, 32, '6a652bd8495d3cda9319552638937d77.jpg'),
(143, 32, '407a757870386e46664ef2869a598a67.jpg'),
(144, 32, 'd0b0d48dead091a835ac4f66239503b2.jpg'),
(145, 32, '3e46ab56488e3675408b0446e2ea022e.jpg'),
(146, 33, 'd25af54933feb85e8bcf24d0bfb64c29.jpg'),
(147, 33, '583c297b2bfd7a7b19d4b71cfa3a816b.jpg'),
(148, 33, '7e1f23837175bcf0cd38d0edae5faf2b.jpg'),
(149, 33, 'a0cad6e347e598e2fc37224bc08a14a6.jpg'),
(165, 30, '8b3c25d26f4b37ce302da08d23efdea5.jpg'),
(166, 30, '3b98fc2798ed8aaba76ac7498072c744.jpg'),
(167, 30, '9a15bd87294f136fa9137e96f75a72a4.jpg'),
(168, 30, 'e3b954350d2d78de533062980906cb22.jpg'),
(170, 27, '33cd46000f95c54aac707fb473e62559.jpg'),
(171, 27, 'f3f147433846946f745e8f5390df68f9.jpg'),
(172, 27, '748002fa0ca775bf9faa854a34f159e3.jpg'),
(173, 27, '49b6ff5652ec7ad9912bd90742deabae.jpg'),
(174, 27, '5da5fbd403deceac9fdc913fbb1ade4d.jpg'),
(175, 27, '31b621f717ca5e58240db1fd285cc90d.jpg'),
(176, 27, '76970c649824bdf0cc700de4f3b682e3.jpg'),
(177, 34, '5808a89913294cc87d4054c751ef9b81.jpg'),
(178, 34, 'dacca39c86528613aeefb4cdffdc7b8d.jpg'),
(179, 34, '532bf0cb04738bfe2c3db1754d5dea2c.jpg'),
(180, 35, '51c5884194cc5fd8f09fc7fc40c762ae.png'),
(181, 35, '2b69c462587f79924ec35d700740bd2a.png'),
(182, 35, '9e4b40b3b8f2281ea13f337903a3d39d.png'),
(183, 35, 'd02e6f11f373abfcd674183767cd7d9a.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sub_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `num_of_tags` int(11) NOT NULL,
  `feature_listing` int(11) NOT NULL,
  `price` float NOT NULL,
  `enable_disable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `name`, `num_of_tags`, `feature_listing`, `price`, `enable_disable`) VALUES
(4, 'Free Package', 5, 1, 0, 1),
(5, 'Silver', 10, 1, 100, 1),
(6, 'Gold', 20, 1, 150, 1),
(7, 'Platinum', 35, 1, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trending_banner`
--

CREATE TABLE `trending_banner` (
  `trending_id` int(11) NOT NULL,
  `trending_img` varchar(100) NOT NULL,
  `order_slider` int(11) NOT NULL,
  `enable_disable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trending_banner`
--

INSERT INTO `trending_banner` (`trending_id`, `trending_img`, `order_slider`, `enable_disable`) VALUES
(13, 'cd8bbbd0f71d485b8ca80aad9e9676d9.png', 1, 1),
(14, '0864f8115ccf5421f152cae5124ce87b.png', 2, 1),
(15, '787e465d42fffc378b178ddc6c7b6e7d.png', 4, 1),
(16, '7a433d28c6f1dac306fdfefbf3280ef9.png', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `category` (`category`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`home_slider_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`screenshot_id`),
  ADD KEY `app_id` (`app_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `trending_banner`
--
ALTER TABLE `trending_banner`
  ADD PRIMARY KEY (`trending_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `home_slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `screenshot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trending_banner`
--
ALTER TABLE `trending_banner`
  MODIFY `trending_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
