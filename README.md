
<div id="top"></div>

<div align="center">

<img src="https://svg-rewriter.sachinraja.workers.dev/?url=https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2F%40mdi%2Fsvg%406.7.96%2Fsvg%2Fapi.svg&fill=%23F97316&width=200px&height=200px" style="width:200px;"/>

<h3 align="center">ParkourPulse.com REST API client and stack shortcodes</h3>

<p align="center">
    This is a small shortcode to display a "stack" of images from the latest ParkourPulse images.
</p>    
</div>



##  1. <a name='TableofContents'></a>Table of Contents



* 1. [Table of Contents](#TableofContents)
* 2. [About The Project](#AboutTheProject)
	* 2.1. [Built With](#BuiltWith)
	* 2.2. [Installation](#Installation)
* 3. [Usage](#Usage)
	* 3.1. [`[andyp_pulse_stack]`](#andyp_pulse_stack)
	* 3.2. [`[andyp_pulse_rest]`](#andyp_pulse_rest)
* 4. [ Customising](#Customising)
* 5. [Troubleshooting](#Troubleshooting)
* 6. [Contributing](#Contributing)
* 7. [License](#License)
* 8. [Contact](#Contact)
* 9. [Changelog](#Changelog)



##  2. <a name='AboutTheProject'></a>About The Project

This wordpress plugin was created to pull in the latest images from ParkourPulsee.com into LondonParkour.com so that a nice "Stack" CSS-effect of images could be displayed to show the latest youtube posts.
To accomplish this, two parts needs to happen:
1. ParkourPulse needed to extend it's REST API so that the custom post type and associated images could be queried.
1. LondonParkour needed a shortcode to communicate with that REST API endpoint, pull the images and render them out in the "stack".

This plugin addresses the second part. It communicates with the API and pulls in the data. It then provides shortcodes to render them out.

<p align="right">(<a href="#top">back to top</a>)</p>



###  2.1. <a name='BuiltWith'></a>Built With

This project was built with the following frameworks, technologies and software.

* [Anime.JS](https://animejs.com)
* [SASS](https://sass-lang.com/)
* [PHP](https://php.net/)
* [Wordpress](https://wordpress.org/)
* [Composer](https://getcomposer.org/)
* [Tailwind](https://tailwindcss.com/)

<p align="right">(<a href="#top">back to top</a>)</p>



###  2.2. <a name='Installation'></a>Installation

These are the steps to get up and running with this plugin.

1. Clone the repo into your wordpress plugin folder
    ```sh
    git clone https://github.com/IORoot/wp-plugin__REST--pulse ./wp-content/plugins/ParkourPulse_REST_API
    ```
1. Insert one of the two shortcodes into your page.
    ```php
    [andyp_pulse_stack] or [andyp_pulse_rest]
    ```

<p align="right">(<a href="#top">back to top</a>)</p>



##  3. <a name='Usage'></a>Usage

There are two shortcodes available:

###  3.1. <a name='andyp_pulse_stack'></a>`[andyp_pulse_stack]`

The `[andyp_pulse_stack]` shortcode can be used to automatically query the ParkourPulse.com REST API and render the image stack.
Just place wherever needed in your page.

This has a couple of features worth noting:

1. It uses transients of one day. This is to cache the results.
1. It styles the output based on the TailwindCSS Framework.


###  3.2. <a name='andyp_pulse_rest'></a>`[andyp_pulse_rest]`

This shortcode allows for much more flexibility. There are six parameters that can be used to control the output.

1. The number of results you wish to retrieve. Default is 5.
```php
[andyp_pulse_rest count="10"]
```

2. The column of data to order the results. Default is "date"
```php
[andyp_pulse_rest order="date"]
```

3. The posttype to actually search upon. The default is "tutorial".
```php
[andyp_pulse_rest posttype="post"]
```

4. The category name to filter the results upon. The default is null.
```php
[andyp_pulse_rest category="demos"]
```

5. The classes you wish to add to the resulting images. The default is empty.
```php
[andyp_pulse_rest classes="w-10 block rounded"]
```

6   The `content` is anything that's between and opening and close tag. This allows for `{{moustache}}` brackets to substitute any post column to substituted for its value:
```php
[andyp_pulse_rest]
    This is the title: {{post_title}}
[/andyp_pulse_rest]
```

Using this shortcode allows you return multiple posts and display their details:
e.g.
```html
[andyp_pulse_rest posttype="post" count="10" classes="w-10 rounded p-4 bg-gray-500"]
    <h1>{{post_title}} : {{published_date}}</h1>
[/andyp_pulse_rest]
```


##  4. <a name='Customising'></a> Customising

You can simply change the endpoint in the code here:

[https://github.com/IORoot/wp-plugin__REST--pulse/blob/master/src/REST/pulse_rest.php](https://github.com/IORoot/wp-plugin__REST--pulse/blob/master/src/REST/pulse_rest.php)

Line 20:
```php
public $endpoint = "https://parkourpulse.com/wp-json/wp/v2";
```

[https://github.com/IORoot/wp-plugin__REST--pulse/blob/master/src/REST/stack.php](https://github.com/IORoot/wp-plugin__REST--pulse/blob/master/src/REST/stack.php)
Line 14

```php
public $endpoint = "https://parkourpulse.com/wp-json/wp/v2";
```

##  5. <a name='Troubleshooting'></a>Troubleshooting

If the site is not picking up the JSON and images delete the transients using the WP CLI tool.

```
sudo -u www-data wp transient list
sudo -u www-data wp transient delete pulserest-pulse
sudo -u www-data wp transient delete pulsestack
```

<p align="right">(<a href="#top">back to top</a>)</p>



##  6. <a name='Contributing'></a>Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue.
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



##  7. <a name='License'></a>License

Distributed under the MIT License.

MIT License

Copyright (c) 2022 Andy Pearson

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

<p align="right">(<a href="#top">back to top</a>)</p>



##  8. <a name='Contact'></a>Contact

Author Link: [https://github.com/IORoot](https://github.com/IORoot)

<p align="right">(<a href="#top">back to top</a>)</p>

##  9. <a name='Changelog'></a>Changelog

v1.0.0 - initial version
