# WP-Optimisations

## Warning: Opinionated!
Just to let you know, this is a highly opinionated way of doing things. I don't know if what works for me will work for you. However, in my use, I have found WP to be very opinionated anyway - I just disagree with _a lot_ of those opinions... 

1. WordPress requires jQuery & jQuery Migrate. jQuery itself is fine as most major plugins need it, but jQuery Migrate is a weird thing to require. 
2. It expects you'll use the new Block Editor and includes a stylesheet even if you don't. (More on this later.)
3. oEmbed is included and adds quite a lot of bloat for what little it does.

## What it does
- Removes unnecessary CSS files (at the moment, just the Block Library CSS (`block-library`).
- Remove jQuery Migrate, because it's not necessary in most cases.
- Remove the quagmire that is oEmbed support. 

## What it does not
- Remove `wp-emoji`. I want to, because I hate all the bloat it adds, but I'm not aware of a clean way to disable it in full without breaking something entirely different in the process. It's the WP equivalent of this:
>Two CSS properties walk into a bar. A barstool in a completely different bar falls over.
>[credit](https://twitter.com/thomasfuchs/status/493790680397803521?lang=en)
>
## Philosophy
I _always_ use [Classic Editor](https://github.com/WordPress/classic-editor) because every WP site I launch takes advantage of [Advanced Custom Fields](https://github.com/elliotcondon/acf). For one, I believe you need to buy ACF's premium package if you want it to work with the Block Editor which is a bit much. Additionally, by now most of my clients have a  bit of experience with the Classic Editor. There's really no argument I can see in favour of the Block Editor. (Side note: as of the time of writing, the Classic Editor plugin has 3m installs. I ain't sayin' that means BE was a bad idea...)
