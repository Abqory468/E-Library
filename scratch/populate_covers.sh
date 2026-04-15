#!/bin/bash

# Define paths
ROMANCE="/Users/abqoryhisan/.gemini/antigravity/brain/4fe761ef-3e09-407a-8f14-0dc4682d82bc/romance_cover_base_1776047709708.png"
ACTION="/Users/abqoryhisan/.gemini/antigravity/brain/4fe761ef-3e09-407a-8f14-0dc4682d82bc/action_cover_base_1776047760741.png"
EDUCATION="/Users/abqoryhisan/.gemini/antigravity/brain/4fe761ef-3e09-407a-8f14-0dc4682d82bc/education_cover_base_1776047805570.png"
FICTION="/Users/abqoryhisan/.gemini/antigravity/brain/4fe761ef-3e09-407a-8f14-0dc4682d82bc/fiction_cover_base_1776047830384.png"
GENERAL="/Users/abqoryhisan/.gemini/antigravity/brain/4fe761ef-3e09-407a-8f14-0dc4682d82bc/general_cover_base_1776047867562.png"

TARGET="storage/app/public/covers"

# Education
cp "$EDUCATION" "$TARGET/atomic_habits.png"
cp "$EDUCATION" "$TARGET/filosofi_teras.png"
cp "$EDUCATION" "$TARGET/psychology_of_money.png"

# General / Sejarah
cp "$GENERAL" "$TARGET/sapiens.png"

# Romance / Sastra
cp "$ROMANCE" "$TARGET/bumi_manusia.png"
cp "$ROMANCE" "$TARGET/dilan_1990.png"
cp "$ROMANCE" "$TARGET/mariposa.png"
cp "$ROMANCE" "$TARGET/dikta_hukum.png"
cp "$ROMANCE" "$TARGET/garis_waktu.png"

# Action
cp "$ACTION" "$TARGET/pulang.png"
cp "$ACTION" "$TARGET/pergi.png"
cp "$ACTION" "$TARGET/hujan.png"

# Fiction / Sastra Other
cp "$FICTION" "$TARGET/laskar_pelangi.png"
cp "$FICTION" "$TARGET/cantik_itu_luka.png"
cp "$FICTION" "$TARGET/laut_bercerita.png"

# Fill the rest (sample_16 to sample_47)
BASES=("$ROMANCE" "$ACTION" "$EDUCATION" "$FICTION" "$GENERAL")

for i in {16..47}
do
    INDEX=$((RANDOM % 5))
    BASE=${BASES[$INDEX]}
    cp "$BASE" "$TARGET/sample_$i.png"
done

echo "Covers copied successfully."
