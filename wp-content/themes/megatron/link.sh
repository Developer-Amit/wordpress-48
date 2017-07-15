#!/bin/sh
for t in {"main","portfolio","portfolio02","portfolio03","portfolio04","construction","hospital","handyman","cleaning","fitness","interior","lawyer","logistics"};
do
	for f in *; 
	do
		if [ -f /home/dev.g5plus.net/public_html/megatron/"$t"/wp-content/themes/megatron/"$f" ]; then
			continue
		fi
		if [ -d /home/dev.g5plus.net/public_html/megatron/"$t"/wp-content/themes/megatron/"$f" ]; then
			continue
		fi
		
		if [ "$f" != "style.css" ] && [ "$f" != "style.min.css" ] && [ "$f" != "link.sh" ]; then
			ln -s /home/resources/megatron/trunk/"$f" /home/dev.g5plus.net/public_html/megatron/"$t"/wp-content/themes/megatron/"$f"
		fi
	done
	
	if [ -d /home/dev.g5plus.net/public_html/megatron/"$t"/wp-content/plugins/megatron-framework ]; then
		continue
	fi

	ln -s /home/resources/megatron/trunk/theme-plugins/megatron-framework /home/dev.g5plus.net/public_html/megatron/"$t"/wp-content/plugins/megatron-framework
done

chown -R apache:apache /home

echo "Create Symbolic Link Done"