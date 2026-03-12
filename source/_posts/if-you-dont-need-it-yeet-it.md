---
extends: _layouts.post
section: content
title: If you don't need it, yeet it.
date: 2026-03-12
description: Stop cluttering repos with useless files.
cover_image: /assets/img/post-cover-image-2.png
categories: [software]
published: true
---

I've joined a few teams over the years, and one thing I've noticed is that a lot of teams tend to be more inclined to 
hoard things that may have been useful 5 years ago but have zero impact on the day to day operations of the team in the
current day.

If you dont need it, yeet it. 

I just came up with that. But it feels right. Get rid of it! If you remove it via Git, then in the off chance when Mercury is
in the microwave, Pluto is dancing with Titan around Deimos, and everything is on fire, you can reverse the removal commit and 
there is your old ass script waiting for you like a long lost teddy bear waiting for the kid to come back to the hotel.

Removing old files helps people navigate code bases faster. If the team standardized around Jetbrains, then get rid of the Netbeans configs. 
If you have to do a one off script, run it once and then delete it via git. Even old migrations can be packaged up into a zip or collapsed
into a single file that makes it easy to hold on to yet not clutter things up. Honestly how many times have you thought "the migration from 2018 is still crucial"?
I bet you the column you added then doesnt even exist anymore.

Yeet it, and enjoy a cleaner repo.