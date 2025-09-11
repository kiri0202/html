# yumのアップデイト①
# sudo yum -y update

# Apacheのインストール②
sudo yum -y install httpd

# Firewallsの無効③
sudo systemctl stop firewalld

# EPELのリポジトリ追加④
sudo yum -y install epel-release

# Remiのリポジトリ追加⑤
sudo yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm

# PHPのインストール⑥
sudo yum -y install --enablerepo=remi,remi-php72 php php-cli php-common php-devel php-mbstring php-pdo php-gd php-xml php-mcrypts php-pecl-xdebug

# phpMyAdminのインストール⑦
sudo yum install -y --enablerepo=remi-php72 phpMyAdmin

# httpd.confの設定書き換え⑧
sudo cp -f /vagrant/conf/httpd.conf /etc/httpd/conf/httpd.conf

# シンボリックリンクの作成⑨
sudo rm -rf /var/www/html
sudo ln -fs /vagrant/html /var/www/html

# Install MySQL⑩
sudo yum -y install http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
sudo yum -y install mysql-community-server

# Start MySQL when vagrant is up⑪
sudo systemctl enable mysqld.service
sudo systemctl start mysqld.service

# 自動起動設定⑫
sudo systemctl enable httpd.service

# Apacheの起動⑬
sudo systemctl start httpd

# 完了
echo "provision success" 