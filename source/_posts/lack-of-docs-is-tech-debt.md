---
extends: _layouts.post
section: content
title: Lack of documentation is technical debt.
date: 2026-04-06
description: Lack of documentation, especially in the AI age, will only make everyone's job harder.
cover_image: /assets/img/post-cover-image-2.png
categories: [software, culture]
published: true
---

When we think of technical debt, we usually think of a pile of code decisions that were made over the years that were made either in
the name of fixing a mission critical bug, getting something out by a hard deadline, or just pure laziness. And no shame on
the last one. I've made those decisions before, and plenty of others have too. We usually think of tech debt though is accumulated
debt in the actual code base. Passing an array that should be a DTO, not writing tests, not doing a proper refactor. The list can, and will,
go on.

However technical debt, in my opinion, is more than just actual code and infrastructure trade-offs made in the name of a deadline, or fixing a bug
facing people in production. I would argue, strongly, that lack of documentation for a team and codebase, is another form of technical debt. Even in the age of AI, which can
has a propensity to be wrong when it comes to basic understanding of things. 

Having tech docs that are out of date, grossly incomplete, or not organized in a place like Confluence means not setting your developers up for success. Sure we can now
have AI examine the codebase and give us its thoughts but even if you have all the optimal docs such as a `CLAUDE.md`, `LESSONS.md`, and other AI files, it doesnt have the years
of context from the trade offs made in the code base.

To this point, I joined a new team a few weeks ago. I had Claude go through various classes and give me an overview so I could ramp up faster. I did this because there was no other
kind of technical documentation and the teams are somewhat siloed. So I let Claude rip. While it got close, it did make assumptions based on best practice such as assuming the database 
had foreign keys on the tables for data integrity. There are few foreign keys in this codebase, and they are far between. I would have known this the first time if it was documented.

We should also be documenting code styling and guidelines. It keeps the team on the same page in a human readable way. Absolutely set this up for Claude as well, but there should be a 
human readable wiki as well, not in the codebase but somewhere else that is constantly updated. 

Documentating is not just limited to coding style guidelines, and code overviews. You can use this to document the software lifecycle for your team. What happens after a PR gets the required
approvals? What happens after QA? If I need SRE/Ops to sign off, who does that and how do I signal that to them? These things being documented make your new team members
feel less like they are in the deep end of the pool without any floaties. It makes them feel more comfortable in the first few weeks, which is always chaotic and stressful for new people.

Your team can only be as successful as your documentation. Make this a point to be done by your team, and your team will be off to the moon.