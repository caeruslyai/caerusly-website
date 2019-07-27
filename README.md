# caerusly-website #

Public-facing web site

## Development Bootstrap ##

*Requirements:*

- Git
- Composer[https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx]
- Virtualbox[https://www.virtualbox.org/wiki/Downloads] >= 4.3.10
- Vagrant[https://www.vagrantup.com/downloads.html] >= 2.1.0
- Ansible ~= 2.7

*First-time bootstrap:*

- Install required software (above)
- Clone git repo
- Change to 'site' directory inslide repo `cd caerusly-website/site`
- Install vendor dependencies `composer install`
- [theme install TBD]
- [other configs TBD, e.g. vault_pass]
- Change to 'trellis' directory `cd ../trellis`
- Install Ansible requirements `ansible-galaxy install -r requirements.yml`
- Start virtual host `vagrant up` (this may take a while)
- Access local site at: `http://caerusly.dev` - admin login at `http://caerusly.dev/wp/wp-admin`