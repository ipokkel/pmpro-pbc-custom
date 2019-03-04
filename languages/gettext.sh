#---------------------------
# This script generates a new pmpro-pbc-custom.pot file for use in translations.
# To generate a new pmpro-pbc-custom.pot, cd to the main /pmpro-pbc-custom/ directory,
# then execute `languages/gettext.sh` from the command line.
# then fix the header info (helps to have the old pmpro-pbc-custom.pot open before running script above)
# then execute `cp languages/pmpro-pbc-custom.pot languages/pmpropbc.po` to copy the .pot to .po
# then execute `msgfmt languages/pmpropbc.po --output-file languages/pmpropbc.mo` to generate the .mo
#---------------------------
echo "Updating pmpro-pbc-custom.pot... "
xgettext -j -o languages/pmpro-pbc-custom.pot \
--default-domain=pmpro-pbc-custom \
--language=PHP \
--keyword=_ \
--keyword=__ \
--keyword=_e \
--keyword=_ex \
--keyword=_n \
--keyword=_x \
--sort-by-file \
--package-version=1.0 \
--msgid-bugs-address="jason@strangerstudios.com" \
$(find . -name "*.php")
echo "Done!"
