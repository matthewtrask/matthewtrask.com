<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>' ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ $page->siteName }}</title>
        <link>{{ $page->baseUrl }}</link>
        <description>{{ $page->siteDescription }}</description>
        <language>en-us</language>
        <atom:link href="{{ $page->baseUrl }}/blog/feed.xml" rel="self" type="application/rss+xml" />

        @foreach ($posts->take(20) as $post)
            <item>
                <title>{{ $post->title }}</title>
                <link>{{ $post->getUrl() }}</link>
                <guid isPermaLink="true">{{ $post->getUrl() }}</guid>
                <description><![CDATA[{!! $post->description ?? strip_tags(substr($post->getContent(), 0, 255)) !!}]]></description>
                <pubDate>{{ date('r', $post->date) }}</pubDate>
                @if ($post->categories)
                    @foreach ($post->categories as $cat)
                        <category>{{ $cat }}</category>
                    @endforeach
                @endif
            </item>
        @endforeach
    </channel>
</rss>
